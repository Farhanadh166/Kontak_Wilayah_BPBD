@extends('adminlte::page')

@section('title', 'Tambah Wilayah')

@section('content_header')
<h1>Tambah Wilayah</h1>
@stop

@section('content')

<div class="card">
<div class="card-body">

<form action="/wilayah/store" method="POST">

@csrf

<div class="form-group">
<label>Nama Wilayah</label>
<input type="text" name="nama_wilayah" class="form-control">
</div>

<button class="btn btn-primary">Simpan</button>
<a href="/wilayah" class="btn btn-secondary">Kembali</a>

</form>

</div>
</div>

@stop