@extends('adminlte::page')

@section('title', 'Edit Sirine')

@section('content_header')
    <h1>Edit Data Sirine</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ url('/sirine/update/'.$sirine->id) }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Nama Sirine</label>
                <input type="text" name="nama_sirine" value="{{ old('nama_sirine', $sirine->nama_sirine) }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Wilayah</label>
                <select name="wilayah_id" class="form-control">
                    <option value="">Pilih wilayah</option>
                    @foreach($wilayahList as $w)
                        <option value="{{ $w->id }}" @selected((string) old('wilayah_id', $sirine->wilayah_id) === (string) $w->id)>{{ $w->nama_wilayah }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Latitude</label>
                <input type="number" step="0.0000001" name="latitude" value="{{ old('latitude', $sirine->latitude) }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Longitude</label>
                <input type="number" step="0.0000001" name="longitude" value="{{ old('longitude', $sirine->longitude) }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Level Suara</label>
                <select name="level_suara" class="form-control">
                    <option value="1" @selected((int) old('level_suara', $sirine->level_suara) === 1)>Level 1</option>
                    <option value="2" @selected((int) old('level_suara', $sirine->level_suara) === 2)>Level 2</option>
                    <option value="3" @selected((int) old('level_suara', $sirine->level_suara) === 3)>Level 3</option>
                </select>
            </div>

            <div class="form-group">
                <label>Alasan Perubahan (opsional)</label>
                <input type="text" name="reason" class="form-control" placeholder="Misal: pemeliharaan berkala">
            </div>

            <div class="form-check mb-2">
                <input type="hidden" name="is_active" value="0">
                <input type="checkbox" name="is_active" value="1" class="form-check-input" id="is_active" @checked(old('is_active', $sirine->is_active))>
                <label class="form-check-label" for="is_active">Sirine Aktif</label>
            </div>

            <div class="form-check mb-3">
                <input type="hidden" name="is_simulation" value="0">
                <input type="checkbox" name="is_simulation" value="1" class="form-check-input" id="is_simulation" @checked(old('is_simulation', $sirine->is_simulation))>
                <label class="form-check-label" for="is_simulation">Mode Simulasi</label>
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="/sirine" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@stop

