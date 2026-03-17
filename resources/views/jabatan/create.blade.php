@extends('adminlte::page')

@section('title', 'Tambah Jabatan')

@section('content_header')
<h1>Tambah Jabatan</h1>
@stop

@section('content')

<div class="card">
<div class="card-body">

<form action="/jabatan/store" method="POST">

@csrf

<div class="form-group">
<label>Nama Jabatan</label>
<input type="text" name="nama_jabatan" class="form-control">
</div>

<button class="btn btn-primary">Simpan</button>
<a href="/jabatan" class="btn btn-secondary">Kembali</a>

</form>

</div>
</div>

@stop