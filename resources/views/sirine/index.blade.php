<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoring & Kontrol Sirine - Digitalisasi BPBD Sumbar 1.0</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
    <style>
        body { font-family: 'Inter', sans-serif; background: #0f172a; color: #e5e7eb; }
        .panel {
            background: linear-gradient(180deg, rgba(2, 6, 23, 0.7), rgba(15, 23, 42, 0.93));
            border: 1px solid rgba(148, 163, 184, 0.25);
            border-radius: 1rem;
            box-shadow: 0 16px 38px rgba(2, 6, 23, 0.6);
        }
        #map { height: 560px; border-radius: .9rem; }
        .stat-box { border-radius: .85rem; padding: .8rem .95rem; background: rgba(15,23,42,.6); border:1px solid rgba(148,163,184,.2);}
        .stat-box .label { font-size:.72rem; text-transform: uppercase; letter-spacing: .1em; color:#cbd5e1;}
        .stat-box .value { font-size:1.15rem; font-weight:800; color:#fff;}
        .leaflet-popup-content-wrapper, .leaflet-popup-tip { background: #0b1220; color: #e5e7eb; border:1px solid rgba(148,163,184,.2); }
        .marker-dot { width:16px; height:16px; border-radius:999px; border:2px solid #fff; box-shadow:0 0 0 4px rgba(15,23,42,.35); }
        .marker-normal { background:#22c55e; }
        .marker-siaga { background:#f59e0b; }
        .marker-darurat { background:#ef4444; }
        .marker-offline { background:#6b7280; }
        .table-dark-custom { color:#f3f4f6; }
        .table-dark-custom td, .table-dark-custom th { background: transparent; border-color: rgba(148,163,184,.2);}
        .small-muted { color: rgba(229,231,235,.72); font-size:.82rem; }
    </style>
</head>
<body>
<div class="container py-4">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
        <div>
            <div class="badge bg-dark border border-info-subtle text-info px-3 py-2">Digitalisasi BPBD Sumbar 1.0</div>
            <h1 class="h3 mt-2 mb-1">Monitoring & Kontrol Sirine Peringatan Dini</h1>
            <div class="small-muted">Simulasi visual berbasis peta untuk monitoring status dan kontrol level sirine.</div>
        </div>
        <div class="d-flex gap-2">
            <a href="/" class="btn btn-outline-light btn-sm">Home</a>
            <a href="/dashboard" class="btn btn-outline-light btn-sm">Dashboard Admin</a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row g-3 mb-3">
        <div class="col-6 col-md-2"><div class="stat-box"><div class="label">Total</div><div class="value">{{ $stats['total'] }}</div></div></div>
        <div class="col-6 col-md-2"><div class="stat-box"><div class="label">Normal</div><div class="value text-success">{{ $stats['normal'] }}</div></div></div>
        <div class="col-6 col-md-2"><div class="stat-box"><div class="label">Siaga</div><div class="value text-warning">{{ $stats['siaga'] }}</div></div></div>
        <div class="col-6 col-md-2"><div class="stat-box"><div class="label">Darurat</div><div class="value text-danger">{{ $stats['darurat'] }}</div></div></div>
        <div class="col-6 col-md-2"><div class="stat-box"><div class="label">Offline</div><div class="value text-secondary">{{ $stats['offline'] }}</div></div></div>
    </div>

    <div class="row g-3">
        <div class="col-lg-8">
            <div class="panel p-3">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <div class="fw-bold">Peta Sirine</div>
                    <form action="/sirine/global-emergency" method="POST" class="d-flex gap-2">
                        @csrf
                        <input type="text" name="reason" class="form-control form-control-sm" placeholder="Alasan darurat global (opsional)">
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Aktifkan darurat global untuk semua sirine aktif?')">Darurat Global</button>
                    </form>
                </div>
                <div id="map"></div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="panel p-3 mb-3">
                <div class="fw-bold mb-2">Filter</div>
                <form method="GET" action="/sirine" class="row g-2">
                    <div class="col-12">
                        <label class="small-muted">Wilayah</label>
                        <select name="wilayah_id" class="form-select form-select-sm">
                            <option value="">Semua wilayah</option>
                            @foreach($wilayahList as $w)
                                <option value="{{ $w->id }}" @selected((string)$wilayahId === (string)$w->id)>{{ $w->nama_wilayah }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <label class="small-muted">Status</label>
                        <select name="status" class="form-select form-select-sm">
                            <option value="">Semua status</option>
                            <option value="normal" @selected($status==='normal')>Normal</option>
                            <option value="siaga" @selected($status==='siaga')>Siaga</option>
                            <option value="darurat" @selected($status==='darurat')>Darurat</option>
                            <option value="offline" @selected($status==='offline')>Offline</option>
                        </select>
                    </div>
                    <div class="col-12 d-grid">
                        <button class="btn btn-info btn-sm">Terapkan Filter</button>
                    </div>
                </form>
            </div>

            <div class="panel p-3">
                <div class="fw-bold mb-2">Tambah Sirine</div>
                <form method="POST" action="/sirine/store" class="row g-2">
                    @csrf
                    <div class="col-12"><input type="text" name="nama_sirine" class="form-control form-control-sm" placeholder="Nama Sirine" required></div>
                    <div class="col-12">
                        <select name="wilayah_id" class="form-select form-select-sm">
                            <option value="">Pilih wilayah</option>
                            @foreach($wilayahList as $w)
                                <option value="{{ $w->id }}">{{ $w->nama_wilayah }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6"><input type="number" step="0.0000001" name="latitude" class="form-control form-control-sm" placeholder="Latitude" required></div>
                    <div class="col-6"><input type="number" step="0.0000001" name="longitude" class="form-control form-control-sm" placeholder="Longitude" required></div>
                    <div class="col-6">
                        <select name="level_suara" class="form-select form-select-sm">
                            <option value="1">Level 1</option>
                            <option value="2">Level 2</option>
                            <option value="3">Level 3</option>
                        </select>
                    </div>
                    <div class="col-6 d-flex align-items-center gap-2">
                        <div class="form-check"><input class="form-check-input" type="checkbox" name="is_active" value="1" checked><label class="form-check-label small">Aktif</label></div>
                        <div class="form-check"><input class="form-check-input" type="checkbox" name="is_simulation" value="1" checked><label class="form-check-label small">Simulasi</label></div>
                    </div>
                    <div class="col-12"><button class="btn btn-success btn-sm w-100">Simpan Sirine</button></div>
                </form>
            </div>
        </div>
    </div>

    <div class="row g-3 mt-1">
        <div class="col-lg-8">
            <div class="panel p-3">
                <div class="fw-bold mb-2">Daftar Sirine</div>
                <div class="table-responsive">
                    <table class="table table-sm table-dark-custom">
                        <thead>
                        <tr>
                            <th>Nama</th><th>Wilayah</th><th>Status</th><th>Level</th><th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($sirines as $s)
                            <tr>
                                <td>{{ $s->nama_sirine }}</td>
                                <td>{{ optional($s->wilayah)->nama_wilayah ?? '-' }}</td>
                                <td><span class="badge {{ $s->status === 'normal' ? 'bg-success' : ($s->status === 'siaga' ? 'bg-warning text-dark' : ($s->status === 'darurat' ? 'bg-danger' : 'bg-secondary')) }}">{{ strtoupper($s->status) }}</span></td>
                                <td>{{ $s->level_suara }}</td>
                                <td class="d-flex flex-wrap gap-1">
                                    <a href="/sirine/edit/{{ $s->id }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="/sirine/heartbeat/{{ $s->id }}" method="POST">@csrf<button class="btn btn-info btn-sm">Heartbeat</button></form>
                                    <form action="/sirine/delete/{{ $s->id }}" method="POST" onsubmit="return confirm('Hapus sirine ini?')">@csrf<button class="btn btn-danger btn-sm">Hapus</button></form>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="5" class="text-center text-secondary">Belum ada data sirine.</td></tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel p-3">
                <div class="fw-bold mb-2">Aktivitas Terakhir</div>
                <div style="max-height:300px; overflow:auto;">
                    @forelse($recentLogs as $log)
                        <div class="border-bottom border-secondary-subtle pb-2 mb-2">
                            <div class="fw-semibold">{{ optional($log->sirine)->nama_sirine ?? 'Sirine dihapus' }}</div>
                            <div class="small-muted">{{ strtoupper($log->action) }} | {{ $log->created_at->format('d-m-Y H:i:s') }}</div>
                            <div class="small-muted">Status {{ $log->old_status ?? '-' }} → {{ $log->new_status ?? '-' }}, Level {{ $log->old_level ?? '-' }} → {{ $log->new_level ?? '-' }}</div>
                        </div>
                    @empty
                        <div class="text-secondary">Belum ada log.</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    const sirines = @json($sirinesForMap);

    // Bounding box (perkiraan) area Sumatera Barat
    // Catatan: tanpa GeoJSON batas admin, ini pembatas berbasis kotak untuk meminimalkan tampilan di luar Sumbar.
    const sumbarBounds = L.latLngBounds(
        L.latLng(-2.60, 98.65),   // barat daya
        L.latLng(0.55, 101.55)    // timur laut
    );

    const map = L.map('map', {
        maxBounds: sumbarBounds,
        maxBoundsViscosity: 1.0,
        minZoom: 10
    });

    map.fitBounds(sumbarBounds);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; OpenStreetMap'
    }).addTo(map);

    function markerClass(status) {
        if (status === 'normal') return 'marker-normal';
        if (status === 'siaga') return 'marker-siaga';
        if (status === 'darurat') return 'marker-darurat';
        return 'marker-offline';
    }

    sirines.forEach((s) => {
        const icon = L.divIcon({
            className: '',
            html: `<div class="marker-dot ${markerClass(s.status)}"></div>`,
            iconSize: [16, 16],
            iconAnchor: [8, 8]
        });

        const popup = `
            <div style="min-width: 230px;">
                <div style="font-weight:700; margin-bottom:4px;">${s.nama}</div>
                <div style="font-size:12px; color:#cbd5e1; margin-bottom:6px;">Wilayah: ${s.wilayah}</div>
                <div style="font-size:12px; margin-bottom:8px;">Status: <b>${s.status.toUpperCase()}</b> | Level: <b>${s.level}</b></div>
                <form method="POST" action="/sirine/level/${s.id}" style="display:flex; gap:4px; flex-wrap:wrap;">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="level" value="1">
                    <button style="border:none; padding:4px 8px; border-radius:6px; background:#16a34a; color:#fff; font-size:12px;">Level 1</button>
                </form>
                <form method="POST" action="/sirine/level/${s.id}" style="display:flex; gap:4px; margin-top:4px; flex-wrap:wrap;">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="level" value="2">
                    <button style="border:none; padding:4px 8px; border-radius:6px; background:#f59e0b; color:#111827; font-size:12px;">Level 2</button>
                </form>
                <form method="POST" action="/sirine/level/${s.id}" style="display:flex; gap:4px; margin-top:4px; flex-wrap:wrap;">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="level" value="3">
                    <button style="border:none; padding:4px 8px; border-radius:6px; background:#dc2626; color:#fff; font-size:12px;">Level 3</button>
                </form>
            </div>
        `;

        L.marker([s.lat, s.lng], { icon }).addTo(map).bindPopup(popup);
    });
</script>
</body>
</html>

