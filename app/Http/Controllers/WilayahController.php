<?php

namespace App\Http\Controllers;

use App\Models\Wilayah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Kontak;

class WilayahController extends Controller
{

    public function index()
    {
        $wilayah = Wilayah::all();
        return view('wilayah.index', compact('wilayah'));
    }

    public function create()
    {
        return view('wilayah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_wilayah' => 'required',
            'foto' => 'nullable|image|max:2048',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('wilayah', 'public');
        }

        Wilayah::create([
            'nama_wilayah' => $request->nama_wilayah,
            'foto' => $fotoPath,
        ]);

        return redirect('/wilayah')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $wilayah = Wilayah::findOrFail($id);
        return view('wilayah.edit', compact('wilayah'));
    }

    public function update(Request $request, $id)
    {
        $wilayah = Wilayah::findOrFail($id);

        $request->validate([
            'nama_wilayah' => 'required',
            'foto' => 'nullable|image|max:2048',
        ]);

        $fotoPath = $wilayah->foto;
        if ($request->hasFile('foto')) {
            if ($wilayah->foto) {
                Storage::disk('public')->delete($wilayah->foto);
            }
            $fotoPath = $request->file('foto')->store('wilayah', 'public');
        }

        $wilayah->update([
            'nama_wilayah' => $request->nama_wilayah,
            'foto' => $fotoPath,
        ]);

        return redirect('/wilayah')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $wilayah = Wilayah::findOrFail($id);
        if ($wilayah->foto) {
            Storage::disk('public')->delete($wilayah->foto);
        }
        $wilayah->delete();

        return redirect('/wilayah')->with('success', 'Data berhasil dihapus');
    }

    public function detail($id)
    {
        $wilayah = Wilayah::findOrFail($id);

        $kontak = Kontak::with('jabatan')
            ->where('wilayah_id', $id)
            ->get();

        return view('wilayah.detail', compact('wilayah', 'kontak'));
    }
}
