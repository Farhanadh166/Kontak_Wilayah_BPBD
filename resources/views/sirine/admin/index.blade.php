@extends('adminlte::page')

@section('title', 'Data Monitoring Sirine')

@section('content_header')
    <h1>Data Monitoring Sirine</h1>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="GET" action="/dashboard/sirine" class="row g-2 mb-3">
        <div class="col-md-4">
            <label class="form-label">Filter Lokasi</label>
            <select name="lokasi" class="form-control">
                <option value="">Semua lokasi</option>
                @foreach($lokasiList as $itemLokasi)
                    <option value="{{ $itemLokasi }}" @selected($lokasi === $itemLokasi)>{{ $itemLokasi }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <label class="form-label">Status Aktif</label>
            <select name="status_aktif" class="form-control">
                <option value="">Semua</option>
                <option value="aktif" @selected($statusAktif === 'aktif')>Aktif</option>
                <option value="nonaktif" @selected($statusAktif === 'nonaktif')>Nonaktif</option>
            </select>
        </div>
        <div class="col-md-2 d-flex align-items-end">
            <button class="btn btn-info w-100">Terapkan</button>
        </div>
        <div class="col-md-2 d-flex align-items-end">
            <a href="/dashboard/sirine" class="btn btn-secondary w-100">Reset</a>
        </div>
    </form>

    <a href="/dashboard/sirine/create" class="btn btn-primary mb-3">Tambah Data</a>
    <a href="/dashboard/sirine/export/excel?status_aktif={{ $statusAktif }}&lokasi={{ urlencode((string) $lokasi) }}" class="btn btn-success mb-3">Export Excel</a>
    <a href="/dashboard/sirine/export/pdf?status_aktif={{ $statusAktif }}&lokasi={{ urlencode((string) $lokasi) }}" class="btn btn-danger mb-3">Export PDF</a>
    <a href="/sirine" class="btn btn-info mb-3">Lihat Peta Fullscreen</a>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Petugas</th>
                    <th>Lokasi</th>
                    <th>Lintang</th>
                    <th>Bujur</th>
                    <th>Status</th>
                    <th>Kondisi Alat</th>
                    <th width="170">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($sirines as $s)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $s->nama_petugas }}</td>
                        <td>{{ $s->lokasi }}</td>
                        <td>{{ $s->latitude }}</td>
                        <td>{{ $s->longitude }}</td>
                        <td>
                            <span class="badge {{ $s->status_aktif === 'aktif' ? 'bg-success' : 'bg-secondary' }}">
                                {{ strtoupper($s->status_aktif) }}
                            </span>
                        </td>
                        <td>{{ $s->kondisi_alat ?: '-' }}</td>
                        <td class="d-flex gap-1">
                            <a href="/dashboard/sirine/edit/{{ $s->id }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="/dashboard/sirine/delete/{{ $s->id }}" method="POST" onsubmit="return confirm('Hapus data ini?')">
                                @csrf
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">Belum ada data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@stop

