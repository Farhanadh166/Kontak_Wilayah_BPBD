<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Export PDF Monitoring Sirine</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        .watermark {
            position: fixed;
            top: 25%;
            left: 18%;
            width: 420px;
            opacity: 0.07;
            z-index: -1;
        }
        .header {
            display: table;
            width: 100%;
            margin-bottom: 10px;
        }
        .header-cell {
            display: table-cell;
            vertical-align: middle;
        }
        .logo {
            width: 52px;
            margin-right: 10px;
        }
        h2 { margin: 0 0 10px; }
        .meta { margin-bottom: 12px; font-size: 11px; color: #444; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #777; padding: 6px; text-align: left; }
        th { background: #efefef; }
        .row-aktif td { background: #e9fbe9; }
        .row-nonaktif td { background: #f1f1f1; }
    </style>
</head>
<body>
    @if(!empty($logoBase64))
        <img src="{{ $logoBase64 }}" class="watermark" alt="Watermark BPBD">
    @endif

    <div class="header">
        <div class="header-cell" style="width:60px;">
            @if(!empty($logoBase64))
                <img src="{{ $logoBase64 }}" class="logo" alt="Logo BPBD">
            @endif
        </div>
        <div class="header-cell">
            <h2>Monitoring Sirine BPBD Sumatera Barat</h2>
        </div>
    </div>
    <div class="meta">Tanggal export: {{ now()->format('d-m-Y H:i:s') }}</div>
    <div class="meta">Filter: Status = {{ $statusAktif ?: 'Semua' }}, Lokasi = {{ $lokasi ?: 'Semua' }}</div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Petugas</th>
                <th>Lokasi</th>
                <th>Lintang</th>
                <th>Bujur</th>
                <th>Status</th>
                <th>Kondisi Alat</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sirines as $s)
                <tr class="{{ $s->status_aktif === 'aktif' ? 'row-aktif' : 'row-nonaktif' }}">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $s->nama_petugas }}</td>
                    <td>{{ $s->lokasi }}</td>
                    <td>{{ $s->latitude }}</td>
                    <td>{{ $s->longitude }}</td>
                    <td>{{ strtoupper($s->status_aktif) }}</td>
                    <td>{{ $s->kondisi_alat ?: '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

