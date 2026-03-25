@extends('adminlte::page')

@section('title', 'Data Kontak')

@section('content_header')
    <h1>Data Kontak BPBD</h1>
@stop

@section('content')

<a href="{{ url('/kontak/create') }}" class="btn btn-primary mb-3">
    Tambah Data
</a>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Wilayah</th>
            <th>Jabatan</th>
            <th>Nama</th>
            <th>No HP</th>
            <th width="150px">Aksi</th>
        </tr>
    </thead>

    <tbody>
    @foreach($kontak as $k)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>
                @if($k->foto)
                    <img src="{{ \Illuminate\Support\Facades\Storage::url($k->foto) }}" alt="Foto Kontak" style="max-height: 45px;">
                @else
                    -
                @endif
            </td>
            <td>{{ $k->wilayah->nama_wilayah }}</td>
            <td>{{ $k->jabatan->nama_jabatan }}</td>
            <td>{{ $k->nama }}</td>
            <td>{{ $k->no_hp }}</td>
            <td>

                <a href="{{ url('/kontak/edit/'.$k->id) }}" class="btn btn-warning btn-sm">
                    Edit
                </a>

                <form action="{{ url('/kontak/delete/'.$k->id) }}" method="POST" style="display:inline">
                    @csrf
                    <button class="btn btn-danger btn-sm">
                        Hapus
                    </button>
                </form>

            </td>
        </tr>
    @endforeach
    </tbody>

</table>

@stop