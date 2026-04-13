@extends('adminlte::page')

@section('title', 'Data Kontak')

@section('content_header')
    <h1>Data Kontak BPBD</h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Daftar Kontak</h3>
        <div class="card-tools">
            <a href="{{ url('/kontak/create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Data
            </a>
        </div>
    </div>
    <div class="card-body">
        <table id="kontak-table" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Wilayah</th>
                    <th>Jabatan</th>
                    <th>Nama</th>
                    <th>No HP</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kontak as $k)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="text-center">
                            @if($k->foto)
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($k->foto) }}"
                                     alt="Foto {{ $k->nama }}"
                                     style="max-height: 45px; border-radius: 4px; object-fit: cover;">
                            @else
                                <span class="badge badge-secondary">Tidak Ada</span>
                            @endif
                        </td>
                        <td>{{ $k->wilayah->nama_wilayah }}</td>
                        <td>{{ $k->jabatan->nama_jabatan }}</td>
                        <td>{{ $k->nama }}</td>
                        <td>{{ $k->no_hp }}</td>
                        <td class="text-center">
                            <a href="{{ url('/kontak/edit/'.$k->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <button type="button"
                                    class="btn btn-danger btn-sm btn-hapus"
                                    data-id="{{ $k->id }}"
                                    data-nama="{{ $k->nama }}">
                                <i class="fas fa-trash"></i> Hapus
                            </button>

                            {{-- Form hapus tersembunyi, dipanggil via JS --}}
                            <form id="form-hapus-{{ $k->id }}"
                                  action="{{ url('/kontak/delete/'.$k->id) }}"
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
    {{-- DataTables CSS sudah tersedia di AdminLTE, pastikan plugin aktif --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    {{-- SweetAlert2 --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
@stop

@section('js')
    {{-- DataTables JS --}}
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
    {{-- SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function () {

            // Inisialisasi DataTable
            $('#kontak-table').DataTable({
                responsive: true,
                autoWidth: false,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/id.json' // Bahasa Indonesia
                },
                columnDefs: [
                    { orderable: false, targets: [1, 6] } // Kolom foto & aksi tidak bisa diurutkan
                ]
            });

            // Konfirmasi hapus dengan SweetAlert2
            $(document).on('click', '.btn-hapus', function () {
                const id   = $(this).data('id');
                const nama = $(this).data('nama');

                Swal.fire({
                    title: 'Hapus Data?',
                    html: `Anda yakin ingin menghapus kontak <strong>${nama}</strong>?<br>Data yang dihapus tidak dapat dikembalikan.`,
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