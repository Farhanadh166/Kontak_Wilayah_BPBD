@extends('adminlte::page')

@section('title', 'Edit Kontak')

@section('content_header')
    <h1>Edit Data Kontak</h1>
@stop

@section('content')

<div class="card">
<div class="card-body">

<form action="{{ url('/kontak/update/'.$kontak->id) }}" method="POST">

@csrf

<div class="form-group">
<label>Wilayah</label>
<select name="wilayah_id" class="form-control">

@foreach($wilayah as $w)

<option value="{{ $w->id }}"
@if($w->id == $kontak->wilayah_id) selected @endif>

{{ $w->nama_wilayah }}

</option>

@endforeach

</select>
</div>

<div class="form-group">
<label>Jabatan</label>
<select name="jabatan_id" class="form-control">

@foreach($jabatan as $j)

<option value="{{ $j->id }}"
@if($j->id == $kontak->jabatan_id) selected @endif>

{{ $j->nama_jabatan }}

</option>

@endforeach

</select>
</div>

<div class="form-group">
<label>Nama</label>
<input type="text" name="nama" value="{{ $kontak->nama }}" class="form-control">
</div>

<div class="form-group">
<label>No HP</label>
<input type="text" name="no_hp" value="{{ $kontak->no_hp }}" class="form-control">
</div>

<button class="btn btn-primary">Update</button>
<a href="/kontak" class="btn btn-secondary">Kembali</a>

</form>

</div>
</div>

@stop