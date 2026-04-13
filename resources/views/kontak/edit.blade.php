@extends('adminlte::page')

@section('title', 'Edit Kontak')

@section('content_header')
    <h1>Edit Data Kontak</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">

        {{-- ✅ Tampilkan semua error validasi --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- ✅ Form action pakai POST (bukan PUT), spoofing dengan @method('PUT') --}}
<form action="{{ url('/kontak/update/'.$kontak->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

            <div class="form-group">
                <label>Wilayah</label>
                <select name="wilayah_id" class="form-control @error('wilayah_id') is-invalid @enderror">
                    @foreach($wilayah as $w)
                        <option value="{{ $w->id }}" {{ $w->id == $kontak->wilayah_id ? 'selected' : '' }}>
                            {{ $w->nama_wilayah }}
                        </option>
                    @endforeach
                </select>
                @error('wilayah_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label>Jabatan</label>
                <select name="jabatan_id" class="form-control @error('jabatan_id') is-invalid @enderror">
                    @foreach($jabatan as $j)
                        <option value="{{ $j->id }}" {{ $j->id == $kontak->jabatan_id ? 'selected' : '' }}>
                            {{ $j->nama_jabatan }}
                        </option>
                    @endforeach
                </select>
                @error('jabatan_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama"
                       value="{{ old('nama', $kontak->nama) }}"
                       class="form-control @error('nama') is-invalid @enderror">
                @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

                        <div class="form-group">
                <label>NIP</label>
                <input type="text" name="nip"
                       value="{{ old('nip', $kontak->nip) }}"
                       class="form-control @error('nip') is-invalid @enderror">
                @error('nip') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label>No HP</label>
                <input type="text" name="no_hp"
                       value="{{ old('no_hp', $kontak->no_hp) }}"
                       class="form-control @error('no_hp') is-invalid @enderror">
                @error('no_hp') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label>Foto Person</label>
                {{-- ✅ Foto lama tetap tampil, upload hanya jika ingin ganti --}}
                @if($kontak->foto)
                    <div class="mb-2">
                        <label class="d-block text-muted" style="font-size:0.85rem">Foto saat ini:</label>
                        <img src="{{ Storage::url($kontak->foto) }}?v={{ time() }}"
                             width="100" class="rounded border">
                    </div>
                @endif
                <input type="file" name="foto"
                       class="form-control-file @error('foto') is-invalid @enderror"
                       accept="image/*">
                <small class="text-muted">Kosongkan jika tidak ingin mengganti foto</small>
                @error('foto') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
            </div>

            <br>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="/kontak" class="btn btn-secondary">Kembali</a>
        </form>

    </div>
</div>

@stop