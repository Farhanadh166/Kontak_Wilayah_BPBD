@extends('adminlte::page')

@section('title', 'Data Wilayah')

@section('content_header')
    <h1>Data Wilayah</h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Daftar Wilayah</h3>
        <div class="card-tools">
            <a href="/wilayah/create" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Wilayah
            </a>
        </div>
    </div>
    <div class="card-body">
        <table id="wilayah-table" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama Wilayah</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($wilayah as $w)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="text-center">
                            @if($w->foto)
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($w->foto) }}"
                                     alt="Foto {{ $w->nama_wilayah }}"
                                     style="max-height: 45px; border-radius: 4px; object-fit: cover;">
                            @else
                                <span class="badge badge-secondary">Tidak Ada</span>
                            @endif
                        </td>
                        <td>{{ $w->nama_wilayah }}</td>
                        <td class="text-center">
                            <a href="/wilayah/edit/{{ $w->id }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <button type="button"
                                    class="btn btn-danger btn-sm btn-hapus"
                                    data-id="{{ $w->id }}"
                                    data-nama="{{ $w->nama_wilayah }}">
                                <i class="fas fa-trash"></i> Hapus
                            </button>

                            <form id="form-hapus-{{ $w->id }}"
                                  action="/wilayah/delete/{{ $w->id }}"
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

            $('#wilayah-table').DataTable({
                responsive: true,
                autoWidth: false,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/id.json'
                },
                columnDefs: [
                    { orderable: false, targets: [1, 3] } // Kolom foto & aksi tidak bisa diurutkan
                ]
            });

            $(document).on('click', '.btn-hapus', function () {
                const id   = $(this).data('id');
                const nama = $(this).data('nama');

                Swal.fire({
                    title: 'Hapus Wilayah?',
                    html: `Anda yakin ingin menghapus wilayah <strong>${nama}</strong>?<br>Data yang dihapus tidak dapat dikembalikan.`,
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