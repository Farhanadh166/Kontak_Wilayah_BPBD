@extends('adminlte::page')

@section('title', 'Edit Sirine')

@section('content_header')
    <h1>Edit Data Sirine</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ url('/dashboard/sirine/update/'.$sirine->id) }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Nama Petugas</label>
                <input type="text" name="nama_petugas" value="{{ old('nama_petugas', $sirine->nama_petugas) }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Lokasi</label>
                <input type="text" name="lokasi" value="{{ old('lokasi', $sirine->lokasi) }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Koordinat (Lintang)</label>
                <input type="number" step="0.0000001" name="latitude" value="{{ old('latitude', $sirine->latitude) }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Koordinat (Bujur)</label>
                <input type="number" step="0.0000001" name="longitude" value="{{ old('longitude', $sirine->longitude) }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Keterangan Aktif / Nonaktif</label>
                <select name="status_aktif" class="form-control">
                    <option value="aktif" @selected(old('status_aktif', $sirine->status_aktif) === 'aktif')>Aktif</option>
                    <option value="nonaktif" @selected(old('status_aktif', $sirine->status_aktif) === 'nonaktif')>Nonaktif</option>
                </select>
            </div>

            <div class="form-group">
                <label>Keterangan Kondisi Alat</label>
                <textarea name="kondisi_alat" rows="4" class="form-control" placeholder="Contoh: unit berfungsi normal, perlu servis, baterai lemah, dll.">{{ old('kondisi_alat', $sirine->kondisi_alat) }}</textarea>
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="/dashboard/sirine" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@stop

