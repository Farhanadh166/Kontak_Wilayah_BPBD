@extends('adminlte::page')

@section('title', 'Edit Wilayah')

@section('content_header')
<h1>Edit Wilayah</h1>
@stop

@section('content')

<div class="card">
<div class="card-body">

<form action="/wilayah/update/{{ $wilayah->id }}" method="POST" enctype="multipart/form-data">

@csrf

<div class="form-group">
<label>Nama Wilayah</label>
<input type="text" name="nama_wilayah" value="{{ $wilayah->nama_wilayah }}" class="form-control">
</div>

<div class="form-group">
<label>Foto Wilayah (opsional)</label>
<input type="file" name="foto" class="form-control" accept="image/*">
</div>

@if($wilayah->foto)
<div class="form-group mt-2">
<label>Foto saat ini</label><br>
<img src="{{ \Illuminate\Support\Facades\Storage::url($wilayah->foto) }}" alt="Foto Wilayah" style="max-height: 80px;">
</div>
@endif

<button class="btn btn-primary">Update</button>
<a href="/wilayah" class="btn btn-secondary">Kembali</a>

</form>

</div>
</div>

@stop