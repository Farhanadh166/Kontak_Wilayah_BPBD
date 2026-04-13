@extends('adminlte::page')

@section('title', 'Tambah Kontak')

@section('content_header')
    <h1>Tambah Data Kontak</h1>
@stop

@section('content')

<div class="card">
<div class="card-body">

<form action="{{ url('/kontak/store') }}" method="POST" enctype="multipart/form-data">

@csrf

<div class="form-group">
<label>Wilayah</label>
<select name="wilayah_id" class="form-control">
@foreach($wilayah as $w)
<option value="{{ $w->id }}">{{ $w->nama_wilayah }}</option>
@endforeach
</select>
</div>

<div class="form-group">
<label>Jabatan</label>
<select name="jabatan_id" class="form-control">
@foreach($jabatan as $j)
<option value="{{ $j->id }}">{{ $j->nama_jabatan }}</option>
@endforeach
</select>
</div>

<div class="form-group">
<label>Nama</label>
<input type="text" name="nama" class="form-control">
</div>

<div class="form-group">
<label>NIP</label>
<input type="text" name="nip" class="form-control">
</div>

<div class="form-group">
<label>No HP</label>
<input type="text" name="no_hp" class="form-control">
</div>

<div class="form-group">
<label>Foto Person (opsional)</label>
<input type="file" name="foto" class="form-control" accept="image/*">
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<button class="btn btn-primary">Simpan</button>
<a href="/kontak" class="btn btn-secondary">Kembali</a>

</form>

</div>
</div>

@stop