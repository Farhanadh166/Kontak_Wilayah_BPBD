@extends('adminlte::page')

@section('title', 'Data Jabatan')

@section('content_header')
<h1>Data Jabatan</h1>
@stop

@section('content')

<a href="/jabatan/create" class="btn btn-primary mb-3">
Tambah Jabatan
</a>

<table class="table table-bordered">

<tr>
<th>No</th>
<th>Nama Jabatan</th>
<th>Aksi</th>
</tr>

@foreach($jabatan as $j)

<tr>
<td>{{ $loop->iteration }}</td>
<td>{{ $j->nama_jabatan }}</td>

<td>

<a href="/jabatan/edit/{{ $j->id }}" class="btn btn-warning btn-sm">
Edit
</a>

<form action="/jabatan/delete/{{ $j->id }}" method="POST" style="display:inline">
@csrf
<button class="btn btn-danger btn-sm">Hapus</button>
</form>

</td>

</tr>

@endforeach

</table>

@stop