<?php

namespace App\Http\Controllers;

use App\Models\Sirine;
use App\Models\SirineLog;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SirineController extends Controller
{
    public function index(Request $request)
    {
        $wilayahId = $request->query('wilayah_id');
        $status = $request->query('status');

        $sirinesQuery = Sirine::with('wilayah')->orderBy('nama_sirine');

        if ($wilayahId) {
            $sirinesQuery->where('wilayah_id', $wilayahId);
        }
        if ($status) {
            $sirinesQuery->where('status', $status);
        }

        $sirines = $sirinesQuery->get();
        $sirinesForMap = $sirines->map(function ($s) {
            return [
                'id' => $s->id,
                'nama' => $s->nama_sirine,
                'wilayah' => optional($s->wilayah)->nama_wilayah ?? '-',
                'lat' => (float) $s->latitude,
                'lng' => (float) $s->longitude,
                'status' => $s->status,
                'level' => $s->level_suara,
            ];
        })->values();
        $wilayahList = Wilayah::orderBy('nama_wilayah')->get();

        $stats = [
            'total' => Sirine::count(),
            'normal' => Sirine::where('status', 'normal')->count(),
            'siaga' => Sirine::where('status', 'siaga')->count(),
            'darurat' => Sirine::where('status', 'darurat')->count(),
            'offline' => Sirine::where('status', 'offline')->count(),
        ];

        $recentLogs = SirineLog::with('sirine')
            ->latest()
            ->limit(15)
            ->get();

        return view('sirine.index', compact(
            'sirines',
            'sirinesForMap',
            'wilayahList',
            'stats',
            'recentLogs',
            'wilayahId',
            'status'
        ));
    }

    public function store(Request $request)
    {
        $validated = $this->validateSirine($request);
        $validated['status'] = $this->determineStatus((int) $validated['level_suara']);
        $validated['last_update'] = now();

        Sirine::create($validated);

        return redirect('/sirine')->with('success', 'Data sirine berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $sirine = Sirine::findOrFail($id);
        $wilayahList = Wilayah::orderBy('nama_wilayah')->get();

        return view('sirine.edit', compact('sirine', 'wilayahList'));
    }

    public function update(Request $request, $id)
    {
        $sirine = Sirine::findOrFail($id);
        $validated = $this->validateSirine($request);

        $oldLevel = $sirine->level_suara;
        $oldStatus = $sirine->status;
        $newLevel = (int) $validated['level_suara'];
        $newStatus = $this->determineStatus($newLevel);

        DB::transaction(function () use ($sirine, $validated, $oldLevel, $oldStatus, $newLevel, $newStatus, $request) {
            $sirine->update(array_merge($validated, [
                'status' => $newStatus,
                'last_update' => now(),
            ]));

            $this->writeLog(
                $sirine->id,
                $oldLevel,
                $newLevel,
                $oldStatus,
                $newStatus,
                'update_sirine',
                $request->input('reason'),
                $request
            );
        });

        return redirect('/sirine')->with('success', 'Data sirine berhasil diupdate.');
    }

    public function destroy($id, Request $request)
    {
        $sirine = Sirine::findOrFail($id);

        $this->writeLog(
            $sirine->id,
            $sirine->level_suara,
            null,
            $sirine->status,
            null,
            'delete_sirine',
            $request->input('reason'),
            $request
        );

        $sirine->delete();

        return redirect('/sirine')->with('success', 'Data sirine berhasil dihapus.');
    }

    public function updateLevel(Request $request, $id)
    {
        $request->validate([
            'level' => 'required|integer|between:1,3',
            'reason' => 'nullable|string|max:255',
        ]);

        $sirine = Sirine::findOrFail($id);
        $oldLevel = $sirine->level_suara;
        $oldStatus = $sirine->status;
        $newLevel = (int) $request->level;
        $newStatus = $this->determineStatus($newLevel);

        DB::transaction(function () use ($sirine, $oldLevel, $newLevel, $oldStatus, $newStatus, $request) {
            $sirine->update([
                'level_suara' => $newLevel,
                'status' => $newStatus,
                'last_update' => now(),
            ]);

            $this->writeLog(
                $sirine->id,
                $oldLevel,
                $newLevel,
                $oldStatus,
                $newStatus,
                'update_level',
                $request->reason,
                $request
            );
        });

        return redirect('/sirine')->with('success', 'Level sirine berhasil diubah.');
    }

    public function globalEmergency(Request $request)
    {
        $request->validate([
            'reason' => 'nullable|string|max:255',
        ]);

        DB::transaction(function () use ($request) {
            $sirines = Sirine::where('is_active', true)->get();
            foreach ($sirines as $sirine) {
                $oldLevel = $sirine->level_suara;
                $oldStatus = $sirine->status;

                $sirine->update([
                    'level_suara' => 3,
                    'status' => 'darurat',
                    'last_update' => now(),
                ]);

                $this->writeLog(
                    $sirine->id,
                    $oldLevel,
                    3,
                    $oldStatus,
                    'darurat',
                    'global_emergency',
                    $request->reason ?: 'Aktivasi darurat global',
                    $request
                );
            }
        });

        return redirect('/sirine')->with('success', 'Mode darurat global berhasil diaktifkan.');
    }

    public function heartbeat(Request $request, $id)
    {
        $sirine = Sirine::findOrFail($id);
        $sirine->update([
            'last_seen_at' => now(),
            'status' => $sirine->status === 'offline' ? 'normal' : $sirine->status,
        ]);

        $this->writeLog(
            $sirine->id,
            $sirine->level_suara,
            $sirine->level_suara,
            $sirine->status,
            $sirine->status,
            'heartbeat',
            'Perangkat melaporkan heartbeat',
            $request
        );

        return redirect('/sirine')->with('success', 'Heartbeat perangkat berhasil direkam.');
    }

    private function validateSirine(Request $request): array
    {
        return $request->validate([
            'nama_sirine' => 'required|string|max:255',
            'wilayah_id' => 'nullable|exists:wilayah,id',
            'latitude' => [
                'required',
                'numeric',
                'between:-90,90',
                function ($attribute, $value, $fail) {
                    // Bounding box sederhana area Sumbar untuk mencegah koordinat nyasar
                    if ($value < -5.5 || $value > 0.5) {
                        $fail('Latitude berada di luar area Sumatera Barat.');
                    }
                },
            ],
            'longitude' => [
                'required',
                'numeric',
                'between:-180,180',
                function ($attribute, $value, $fail) {
                    if ($value < 98.0 || $value > 101.5) {
                        $fail('Longitude berada di luar area Sumatera Barat.');
                    }
                },
            ],
            'level_suara' => 'required|integer|between:1,3',
            'is_active' => 'nullable|boolean',
            'is_simulation' => 'nullable|boolean',
            'reason' => 'nullable|string|max:255',
        ]);
    }

    private function determineStatus(int $level): string
    {
        if ($level === 1) {
            return 'normal';
        }
        if ($level === 2) {
            return 'siaga';
        }
        return 'darurat';
    }

    private function writeLog(
        int $sirineId,
        ?int $oldLevel,
        ?int $newLevel,
        ?string $oldStatus,
        ?string $newStatus,
        string $action,
        ?string $reason,
        Request $request
    ): void {
        SirineLog::create([
            'sirine_id' => $sirineId,
            'old_level' => $oldLevel,
            'new_level' => $newLevel,
            'old_status' => $oldStatus,
            'new_status' => $newStatus,
            'action' => $action,
            'changed_by' => 'system',
            'reason' => $reason,
            'source_ip' => $request->ip(),
        ]);
    }
}

