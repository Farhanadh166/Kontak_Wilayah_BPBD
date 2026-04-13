@extends('adminlte::page')

@section('title', 'Data Jabatan')

@section('content_header')
    <h1>Data Jabatan</h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Daftar Jabatan</h3>
        <div class="card-tools">
            <a href="/jabatan/create" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Jabatan
            </a>
        </div>
    </div>
    <div class="card-body">
        <table id="jabatan-table" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Jabatan</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jabatan as $j)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $j->nama_jabatan }}</td>
                        <td class="text-center">
                            <a href="/jabatan/edit/{{ $j->id }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <button type="button"
                                    class="btn btn-danger btn-sm btn-hapus"
                                    data-id="{{ $j->id }}"
                                    data-nama="{{ $j->nama_jabatan }}">
                                <i class="fas fa-trash"></i> Hapus
                            </button>

                            <form id="form-hapus-{{ $j->id }}"
                                  action="/jabatan/delete/{{ $j->id }}"
                                  method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
@stop

@section('js')
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function () {

            $('#jabatan-table').DataTable({
                responsive: true,
                autoWidth: false,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/id.json'
                },
                columnDefs: [
                    { orderable: false, targets: [2] } // Kolom aksi tidak bisa diurutkan
                ]
            });

            $(document).on('click', '.btn-hapus', function () {
                const id   = $(this).data('id');
                const nama = $(this).data('nama');

                Swal.fire({
                    title: 'Hapus Jabatan?',
                    html: `Anda yakin ingin menghapus jabatan <strong>${nama}</strong>?<br>Data yang dihapus tidak dapat dikembalikan.`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: '<i class="fas fa-trash"></i> Ya, Hapus!',
                    cancelButtonText: '<i class="fas fa-times"></i> Batal',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(`#form-hapus-${id}`).submit();
                    }
                });
            });

        });
    </script>
@stop