@extends('adminlte::page')

@section('title', 'Data Wilayah')

@section('content_header')
<h1>Data Wilayah</h1>
@stop

@section('content')

<a href="/wilayah/create" class="btn btn-primary mb-3">
Tambah Wilayah
</a>

<table class="table table-bordered">
<tr>
<th>No</th>
<th>Nama Wilayah</th>
<th>Aksi</th>
</tr>

@foreach($wilayah as $w)

<tr>
<td>{{ $loop->iteration }}</td>
<td>{{ $w->nama_wilayah }}</td>
<td>

<a href="/wilayah/edit/{{ $w->id }}" class="btn btn-warning btn-sm">
Edit
</a>

<form action="/wilayah/delete/{{ $w->id }}" method="POST" style="display:inline">
@csrf
<button class="btn btn-danger btn-sm">Hapus</button>
</form>

</td>
</tr>

@endforeach

</table>

@stop