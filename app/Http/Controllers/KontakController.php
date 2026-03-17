<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use App\Models\Wilayah;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        $kontak = Kontak::with(['wilayah', 'jabatan'])->get();
        return view('kontak.index', compact('kontak'));
    }

    public function create()
    {
        $wilayah = Wilayah::all();
        $jabatan = Jabatan::all();

        return view('kontak.create', compact('wilayah', 'jabatan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'wilayah_id' => 'required',
            'jabatan_id' => 'required',
            'nama' => 'required',
            'no_hp' => 'required'
        ]);

        Kontak::create([
            'wilayah_id' => $request->wilayah_id,
            'jabatan_id' => $request->jabatan_id,
            'nama' => $request->nama,
            'no_hp' => $request->no_hp
        ]);

        return redirect('/kontak')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kontak = Kontak::findOrFail($id);
        $wilayah = Wilayah::all();
        $jabatan = Jabatan::all();

        return view('kontak.edit', compact('kontak', 'wilayah', 'jabatan'));
    }

    public function update(Request $request, $id)
    {
        $kontak = Kontak::findOrFail($id);

        $kontak->update([
            'wilayah_id' => $request->wilayah_id,
            'jabatan_id' => $request->jabatan_id,
            'nama' => $request->nama,
            'no_hp' => $request->no_hp
        ]);

        return redirect('/kontak')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $kontak = Kontak::findOrFail($id);
        $kontak->delete();

        return redirect('/kontak')->with('success', 'Data berhasil dihapus');
    }
}
