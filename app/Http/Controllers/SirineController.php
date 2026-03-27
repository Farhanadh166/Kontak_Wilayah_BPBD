<?php

namespace App\Http\Controllers;

use App\Models\Sirine;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\StreamedResponse;

class SirineController extends Controller
{
    public function index(Request $request)
    {
        $statusAktif = $request->query('status_aktif');
        $lokasi = $request->query('lokasi');

        $sirinesQuery = Sirine::query()->orderBy('lokasi')->orderBy('nama_petugas');
        $this->applyFilters($sirinesQuery, $request);

        $sirines = $sirinesQuery->get();
        $sirinesForMap = $sirines->map(function ($s) {
            return [
                'id' => $s->id,
                'nama_petugas' => $s->nama_petugas,
                'lokasi' => $s->lokasi,
                'lat' => (float) $s->latitude,
                'lng' => (float) $s->longitude,
                'status_aktif' => $s->status_aktif,
                'kondisi_alat' => $s->kondisi_alat,
            ];
        })->values();
        $lokasiList = Sirine::query()
            ->whereNotNull('lokasi')
            ->where('lokasi', '<>', '')
            ->select('lokasi')
            ->distinct()
            ->orderBy('lokasi')
            ->pluck('lokasi');

        $stats = [
            'total' => Sirine::count(),
            'aktif' => Sirine::where('status_aktif', 'aktif')->count(),
            'nonaktif' => Sirine::where('status_aktif', 'nonaktif')->count(),
        ];

        return view('sirine.public.map', compact(
            'sirinesForMap',
            'lokasiList',
            'stats',
            'statusAktif',
            'lokasi'
        ));
    }

    public function adminIndex()
    {
        $statusAktif = request()->query('status_aktif');
        $lokasi = request()->query('lokasi');

        $sirinesQuery = Sirine::query()->orderBy('lokasi')->orderBy('nama_petugas');
        $this->applyFilters($sirinesQuery, request());
        $sirines = $sirinesQuery->get();

        $lokasiList = Sirine::query()
            ->whereNotNull('lokasi')
            ->where('lokasi', '<>', '')
            ->select('lokasi')
            ->distinct()
            ->orderBy('lokasi')
            ->pluck('lokasi');

        return view('sirine.admin.index', compact('sirines', 'lokasiList', 'statusAktif', 'lokasi'));
    }

    public function create()
    {
        return view('sirine.admin.create');
    }

    public function store(Request $request)
    {
        Sirine::create($this->validateSirine($request));
        return redirect('/dashboard/sirine')->with('success', 'Data sirine berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $sirine = Sirine::findOrFail($id);
        return view('sirine.admin.edit', compact('sirine'));
    }

    public function update(Request $request, $id)
    {
        $sirine = Sirine::findOrFail($id);
        $sirine->update($this->validateSirine($request));
        return redirect('/dashboard/sirine')->with('success', 'Data sirine berhasil diupdate.');
    }

    public function destroy($id)
    {
        $sirine = Sirine::findOrFail($id);
        $sirine->delete();
        return redirect('/dashboard/sirine')->with('success', 'Data sirine berhasil dihapus.');
    }

    public function exportExcel(): StreamedResponse
    {
        $statusAktif = request()->query('status_aktif');
        $lokasi = request()->query('lokasi');
        $filename = $this->buildExportFilename('xls', $statusAktif, $lokasi);
        $sirinesQuery = Sirine::query()->orderBy('lokasi')->orderBy('nama_petugas');
        $this->applyFilters($sirinesQuery, request());
        $sirines = $sirinesQuery->get();

        $headers = [
            'Content-Type' => 'application/vnd.ms-excel; charset=UTF-8',
            'Content-Disposition' => "attachment; filename={$filename}",
            'Cache-Control' => 'max-age=0',
        ];

        return response()->stream(function () use ($sirines, $statusAktif, $lokasi) {
            echo "\xEF\xBB\xBF";
            echo '<table border="1">';
            echo '<tr><td colspan="7"><b>Filter:</b> Status = ' . e($statusAktif ?: 'Semua') . ' | Lokasi = ' . e($lokasi ?: 'Semua') . '</td></tr>';
            echo '<tr>';
            echo '<th>No</th><th>Nama Petugas</th><th>Lokasi</th><th>Lintang</th><th>Bujur</th><th>Status</th><th>Kondisi Alat</th>';
            echo '</tr>';

            foreach ($sirines as $i => $s) {
                $rowColor = $s->status_aktif === 'aktif' ? '#e9fbe9' : '#efefef';
                echo '<tr>';
                echo '<td style="background:' . $rowColor . ';">' . ($i + 1) . '</td>';
                echo '<td style="background:' . $rowColor . ';">' . e($s->nama_petugas) . '</td>';
                echo '<td style="background:' . $rowColor . ';">' . e($s->lokasi) . '</td>';
                echo '<td style="background:' . $rowColor . ';">' . e((string) $s->latitude) . '</td>';
                echo '<td style="background:' . $rowColor . ';">' . e((string) $s->longitude) . '</td>';
                echo '<td style="background:' . $rowColor . ';">' . strtoupper(e($s->status_aktif)) . '</td>';
                echo '<td style="background:' . $rowColor . ';">' . e($s->kondisi_alat ?? '-') . '</td>';
                echo '</tr>';
            }

            echo '</table>';
        }, 200, $headers);
    }

    public function exportPdf()
    {
        $statusAktif = request()->query('status_aktif');
        $lokasi = request()->query('lokasi');

        $sirinesQuery = Sirine::query()->orderBy('lokasi')->orderBy('nama_petugas');
        $this->applyFilters($sirinesQuery, request());
        $sirines = $sirinesQuery->get();

        $logoPath = resource_path('views/assets/bpbd.png');
        $logoBase64 = null;
        if (file_exists($logoPath)) {
            $logoBase64 = 'data:image/png;base64,' . base64_encode(file_get_contents($logoPath));
        }

        $pdf = Pdf::loadView('sirine.admin.export_pdf', [
            'sirines' => $sirines,
            'logoBase64' => $logoBase64,
            'statusAktif' => $statusAktif,
            'lokasi' => $lokasi,
        ])
            ->setPaper('a4', 'landscape');

        return $pdf->download($this->buildExportFilename('pdf', $statusAktif, $lokasi));
    }

    private function validateSirine(Request $request)
    {
        return $request->validate([
            'nama_petugas' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
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
            'status_aktif' => 'required|in:aktif,nonaktif',
            'kondisi_alat' => 'nullable|string',
        ]);
    }

    private function applyFilters($query, Request $request): void
    {
        $statusAktif = $request->query('status_aktif');
        $lokasi = $request->query('lokasi');

        if ($statusAktif) {
            $query->where('status_aktif', $statusAktif);
        }

        if ($lokasi) {
            $query->where('lokasi', $lokasi);
        }
    }

    private function buildExportFilename(string $extension, ?string $statusAktif, ?string $lokasi): string
    {
        $parts = ['sirine'];

        if ($statusAktif) {
            $parts[] = Str::slug($statusAktif);
        } else {
            $parts[] = 'semua-status';
        }

        if ($lokasi) {
            $parts[] = Str::slug($lokasi);
        } else {
            $parts[] = 'semua-lokasi';
        }

        $parts[] = now()->format('Ymd-His');

        return implode('-', $parts) . '.' . $extension;
    }
}

