<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kontak – {{ $wilayah->nama_wilayah }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; }

        body {
            font-family: 'Inter', system-ui, sans-serif;
            background: #0a0f1e;
            color: #e5e7eb;
            min-height: 100vh;
        }

        /* ── HERO HEADER ─────────────────────────── */
        .page-hero {
            background:
                radial-gradient(ellipse at top left,  rgba(34,211,238,.2)  0%, transparent 55%),
                radial-gradient(ellipse at bottom right, rgba(59,130,246,.18) 0%, transparent 55%),
                linear-gradient(180deg, #0d1b2e 0%, #0a0f1e 100%);
            border-bottom: 1px solid rgba(148,163,184,.15);
            padding: 2.5rem 0 2rem;
            position: relative;
            overflow: hidden;
        }
        .page-hero::before {
            content: "";
            position: absolute;
            inset: 0;
            background-image: radial-gradient(circle, rgba(148,163,184,.05) 1px, transparent 1px);
            background-size: 28px 28px;
            pointer-events: none;
        }
        .hero-inner {
            position: relative;
            display: flex;
            align-items: center;
            gap: 1.5rem;
            flex-wrap: wrap;
        }
        .hero-logo-wrap {
            flex-shrink: 0;
            width: 88px; height: 88px;
            border-radius: 1.1rem;
            background: rgba(255,255,255,.95);
            border: 2px solid rgba(148,163,184,.4);
            box-shadow: 0 12px 32px rgba(2,6,23,.6);
            display: flex; align-items: center; justify-content: center;
            overflow: hidden;
            padding: 4px;
        }
        .hero-logo { width: 100%; height: 100%; object-fit: contain; }
        .hero-text { flex: 1; min-width: 0; }
        .hero-eyebrow {
            font-size: .72rem;
            text-transform: uppercase;
            letter-spacing: .18em;
            color: #38bdf8;
            font-weight: 700;
            margin-bottom: .4rem;
        }
        .hero-title {
            font-size: clamp(1.5rem, 3vw, 2.1rem);
            font-weight: 700;
            letter-spacing: -.025em;
            color: #f9fafb;
            line-height: 1.15;
            margin: 0 0 .35rem;
        }
        .hero-sub {
            font-size: .85rem;
            color: rgba(229,231,235,.65);
        }
        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: .4rem;
            padding: .45rem 1.1rem;
            border-radius: 999px;
            font-size: .82rem;
            font-weight: 600;
            border: 1px solid rgba(148,163,184,.4);
            background: rgba(15,23,42,.7);
            color: #cbd5e1;
            text-decoration: none;
            transition: all .15s;
            white-space: nowrap;
            flex-shrink: 0;
        }
        .btn-back:hover {
            background: rgba(148,163,184,.15);
            border-color: rgba(148,163,184,.65);
            color: #f1f5f9;
        }

        /* ── STAT STRIP ──────────────────────────── */
        .stat-strip {
            display: flex;
            gap: .75rem;
            flex-wrap: wrap;
            margin: 1.75rem 0;
        }
        .stat-pill {
            background: rgba(15,23,42,.75);
            border: 1px solid rgba(148,163,184,.22);
            border-radius: .85rem;
            padding: .65rem 1.1rem;
            display: flex;
            align-items: center;
            gap: .65rem;
        }
        .stat-icon {
            width: 34px; height: 34px;
            border-radius: .55rem;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }
        .stat-num {
            font-size: 1.25rem;
            font-weight: 700;
            line-height: 1;
        }
        .stat-label {
            font-size: .68rem;
            text-transform: uppercase;
            letter-spacing: .09em;
            color: #64748b;
            margin-top: .1rem;
        }

        /* ── SECTION LABEL ───────────────────────── */
        .section-label {
            font-size: .72rem;
            text-transform: uppercase;
            letter-spacing: .16em;
            color: #475569;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: .6rem;
            margin-bottom: 1rem;
        }
        .section-label::after {
            content: "";
            flex: 1;
            height: 1px;
            background: rgba(148,163,184,.14);
        }

        /* ── PEJABAT CARDS ───────────────────────── */
        .pejabat-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }
        .pejabat-card {
            background:
                radial-gradient(circle at top left, rgba(34,211,238,.1), transparent 60%),
                rgba(13,27,46,.7);
            border: 1px solid rgba(148,163,184,.2);
            border-radius: 1rem;
            padding: 1.1rem 1.2rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            transition: transform .15s, border-color .15s, box-shadow .15s;
            position: relative;
            overflow: hidden;
        }
        .pejabat-card::before {
            content: "";
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 3px;
            background: linear-gradient(90deg, rgba(var(--c),1), rgba(var(--c),.2));
        }
        .pejabat-card:hover {
            transform: translateY(-2px);
            border-color: rgba(56,189,248,.4);
            box-shadow: 0 12px 32px rgba(2,6,23,.55);
        }
        /* Warna aksen per jabatan */
        .role-kalaksa          { --c: 34,211,238; }
        .role-kabid            { --c: 59,130,246; }
        .role-kasi-kedaruratan { --c: 249,115,22; }
        .role-kasi-logistik    { --c: 34,197,94;  }
        .role-other            { --c: 168,85,247; }

        .pejabat-photo {
            width: 68px; height: 68px;
            object-fit: cover;
            border-radius: .75rem;
            border: 2px solid rgba(148,163,184,.35);
            flex-shrink: 0;
            background: rgba(15,23,42,.8);
        }
        .pejabat-info { flex: 1; min-width: 0; }
        .pejabat-role {
            font-size: .66rem;
            text-transform: uppercase;
            letter-spacing: .1em;
            font-weight: 700;
            margin-bottom: .3rem;
            color: rgb(var(--c));
        }
        .pejabat-name {
            font-size: .97rem;
            font-weight: 700;
            color: #f1f5f9;
            line-height: 1.25;
            margin-bottom: .4rem;
        }
        .pejabat-phone {
            display: inline-flex;
            align-items: center;
            gap: .35rem;
            font-size: .78rem;
            font-weight: 600;
            color: #4ade80;
            text-decoration: none;
            background: rgba(37,211,102,.1);
            border: 1px solid rgba(37,211,102,.35);
            border-radius: 999px;
            padding: .2rem .65rem;
            transition: all .14s;
        }
        .pejabat-phone:hover {
            background: rgba(37,211,102,.22);
            border-color: rgba(37,211,102,.65);
            color: #bbf7d0;
            box-shadow: 0 0 10px rgba(37,211,102,.2);
        }
        .empty-role {
            color: rgba(148,163,184,.45);
            font-size: .85rem;
            font-style: italic;
        }

        /* ── TABEL SEMUA KONTAK ──────────────────── */
        .table-wrap {
            background: rgba(13,27,46,.7);
            border: 1px solid rgba(148,163,184,.18);
            border-radius: 1rem;
            overflow: hidden;
        }
        .kontak-table {
            width: 100%;
            border-collapse: collapse;
            font-size: .88rem;
        }
        .kontak-table thead tr {
            background: rgba(15,23,42,.95);
        }
        .kontak-table thead th {
            font-size: .68rem;
            text-transform: uppercase;
            letter-spacing: .14em;
            color: #64748b;
            font-weight: 700;
            padding: .85rem 1.1rem;
            border-bottom: 1px solid rgba(148,163,184,.15);
            white-space: nowrap;
        }
        .kontak-table tbody tr {
            border-bottom: 1px solid rgba(148,163,184,.08);
            transition: background .12s;
        }
        .kontak-table tbody tr:last-child { border-bottom: none; }
        .kontak-table tbody tr:hover { background: rgba(56,189,248,.05); }
        .kontak-table tbody td {
            padding: .85rem 1.1rem;
            color: #e2e8f0;
            vertical-align: middle;
        }
        .td-foto {
            width: 44px; height: 44px;
            object-fit: cover;
            border-radius: .5rem;
            border: 1px solid rgba(148,163,184,.3);
            background: rgba(15,23,42,.8);
        }
        .badge-jabatan {
            display: inline-block;
            font-size: .68rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: .07em;
            padding: .18rem .65rem;
            border-radius: 999px;
            background: rgba(59,130,246,.14);
            border: 1px solid rgba(59,130,246,.35);
            color: #93c5fd;
            white-space: nowrap;
        }
        .phone-link {
            display: inline-flex;
            align-items: center;
            gap: .3rem;
            color: #4ade80;
            text-decoration: none;
            font-weight: 500;
        }
        .phone-link:hover { color: #bbf7d0; text-decoration: underline; }
        .no-data {
            text-align: center;
            padding: 3rem 1rem;
            color: rgba(148,163,184,.4);
            font-size: .9rem;
        }

        /* ── SEARCH BAR ──────────────────────────── */
        .search-wrap {
            position: relative;
            margin-bottom: 1rem;
        }
        .search-wrap svg {
            position: absolute;
            left: .9rem;
            top: 50%;
            transform: translateY(-50%);
            color: #475569;
            pointer-events: none;
        }
        .search-input {
            width: 100%;
            background: rgba(2,6,23,.8);
            border: 1px solid rgba(148,163,184,.22);
            border-radius: .75rem;
            color: #e5e7eb;
            font-size: .88rem;
            padding: .6rem .9rem .6rem 2.4rem;
            outline: none;
            transition: border-color .15s, box-shadow .15s;
        }
        .search-input::placeholder { color: #475569; }
        .search-input:focus {
            border-color: rgba(56,189,248,.6);
            box-shadow: 0 0 0 1px rgba(56,189,248,.25);
        }

        /* ── MOBILE ──────────────────────────────── */
        @media (max-width: 640px) {
            .page-hero { padding: 1.75rem 0 1.5rem; }
            .hero-logo-wrap { width: 68px; height: 68px; }
            .hero-title { font-size: 1.35rem; }
            .stat-num { font-size: 1.1rem; }
            .pejabat-grid { grid-template-columns: 1fr; }
            /* Tabel: hide kolom foto & jabatan di layar sangat kecil */
            .col-foto, .col-jabatan { display: none; }
        }
        @media (max-width: 400px) {
            .stat-pill { padding: .5rem .75rem; }
        }
    </style>
</head>
<body>

<!-- ── HERO ────────────────────────────────────────── -->
<div class="page-hero">
    <div class="container">
        <div class="hero-inner">
            <div class="hero-logo-wrap">
                <img class="hero-logo"
                     src="{{ $wilayah->foto ? Storage::url($wilayah->foto) : url('/assets/bpbd.png') }}"
                     alt="Logo {{ $wilayah->nama_wilayah }}">
            </div>
            <div class="hero-text">
                <div class="hero-eyebrow">Detail Wilayah · BPBD Sumatera Barat</div>
                <h1 class="hero-title">{{ $wilayah->nama_wilayah }}</h1>
                <div class="hero-sub">Direktori kontak kedaruratan &amp; logistik</div>
            </div>
            <a href="/kontak-wilayah" class="btn-back">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 12H5M12 5l-7 7 7 7"/>
                </svg>
                Kembali
            </a>
        </div>
    </div>
</div>

<!-- ── MAIN ────────────────────────────────────────── -->
<main class="container py-4">

    @php
        // Helper: ubah nomor HP Indonesia → link WhatsApp
        function waLink(string $hp): string {
            $clean = preg_replace('/\D/', '', $hp);          // hapus non-digit
            if (str_starts_with($clean, '0')) {
                $clean = '62' . substr($clean, 1);           // 08xx → 628xx
            } elseif (!str_starts_with($clean, '62')) {
                $clean = '62' . $clean;                      // tanpa awalan → tambah 62
            }
            return 'https://wa.me/' . $clean;
        }
    @endphp

    @php
        $normalized = $kontak->map(function ($item) {
            $role = \Illuminate\Support\Str::lower(trim(optional($item->jabatan)->nama_jabatan ?? ''));
            if (in_array($role, ['kabid kl','kabid kedaruratan & logistik','kepala bidang kedaruratan & logistik']))
                $role = 'kepala bidang kedaruratan & logistik';
            elseif (in_array($role, ['kalaksa','kepala pelaksana']))
                $role = 'kepala pelaksana';
            elseif ($role === 'kasi kedarutan')
                $role = 'kasi kedaruratan';
            $item->role_norm = $role;
            return $item;
        });

        $operators = $normalized->filter(fn($p) => in_array($p->role_norm, ['operator pusdalops','operator database']))->values();
        $pejabat   = $normalized->filter(fn($p) => !in_array($p->role_norm, ['operator pusdalops','operator database']))->values();

        $singleRoles = [
            'kepala pelaksana'                     => ['label' => 'Kepala Pelaksana',                      'css' => 'role-kalaksa'],
            'kepala bidang kedaruratan & logistik' => ['label' => 'Kepala Bidang Kedaruratan & Logistik',  'css' => 'role-kabid'],
            'kasi kedaruratan'                     => ['label' => 'Kasi Kedaruratan',                      'css' => 'role-kasi-kedaruratan'],
            'kasi logistik'                        => ['label' => 'Kasi Logistik',                         'css' => 'role-kasi-logistik'],
        ];

        $knownRoles = array_keys($singleRoles);
        $others = $normalized->filter(fn($p) =>
            !in_array($p->role_norm, $knownRoles) &&
            !in_array($p->role_norm, ['operator pusdalops','operator database'])
        )->values();
    @endphp

    <!-- Stat Strip -->
    <div class="stat-strip">
        <div class="stat-pill">
            <div class="stat-icon" style="background:rgba(56,189,248,.15);">
                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24" fill="none"
                     stroke="#38bdf8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                </svg>
            </div>
            <div>
                <div class="stat-num" style="color:#38bdf8;">{{ $kontak->count() }}</div>
                <div class="stat-label">Total Kontak</div>
            </div>
        </div>
        <div class="stat-pill">
            <div class="stat-icon" style="background:rgba(134,239,172,.12);">
                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24" fill="none"
                     stroke="#86efac" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 7V5a2 2 0 0 0-4 0v2"/>
                    <line x1="12" y1="12" x2="12" y2="16"/><line x1="10" y1="14" x2="14" y2="14"/>
                </svg>
            </div>
            <div>
                <div class="stat-num" style="color:#86efac;">{{ $pejabat->count() }}</div>
                <div class="stat-label">Pejabat</div>
            </div>
        </div>
        <div class="stat-pill">
            <div class="stat-icon" style="background:rgba(192,132,252,.12);">
                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24" fill="none"
                     stroke="#c084fc" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/>
                </svg>
            </div>
            <div>
                <div class="stat-num" style="color:#c084fc;">{{ $operators->count() }}</div>
                <div class="stat-label">Operator</div>
            </div>
        </div>
    </div>

    <!-- ── Pejabat Struktural ── -->
    <div class="section-label">Pejabat Struktural</div>
    <div class="pejabat-grid">
        @foreach($singleRoles as $roleKey => $roleInfo)
            @php $person = $normalized->firstWhere('role_norm', $roleKey); @endphp
            <div class="pejabat-card {{ $roleInfo['css'] }}">
                <img class="pejabat-photo"
                     src="{{ $person && $person->foto ? Storage::url($person->foto) : url('/assets/bpbd.png') }}"
                     alt="{{ $person ? $person->nama : $roleInfo['label'] }}"
                     onerror="this.src='{{ url('/assets/bpbd.png') }}'">
                <div class="pejabat-info">
                    <div class="pejabat-role">{{ $roleInfo['label'] }}</div>
                    @if($person)
                        <div class="pejabat-name">{{ $person->nama }}</div>
                        <a href="{{ waLink($person->no_hp) }}" target="_blank" rel="noopener" class="pejabat-phone">
                            {{-- Ikon WhatsApp --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413z"/>
                            </svg>
                            {{ $person->no_hp }}
                        </a>
                    @else
                        <div class="empty-role">Belum ada data</div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

    <!-- ── Semua Kontak (Tabel) ── -->
    <div class="section-label" style="margin-top: .5rem;">Semua Kontak Terdaftar</div>

    <div class="search-wrap">
        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none"
             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/>
        </svg>
        <input id="tableSearch" type="text" class="search-input" placeholder="Cari nama atau nomor HP…">
    </div>

    <div class="table-wrap">
        @if($kontak->isEmpty())
            <div class="no-data">Belum ada data kontak untuk wilayah ini.</div>
        @else
        <div style="overflow-x:auto;">
            <table class="kontak-table" id="kontakTable">
                <thead>
                    <tr>
                        <th class="col-foto">Foto</th>
                        <th>Nama</th>
                        <th class="col-jabatan">Jabatan</th>
                        <th>No HP</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kontak as $k)
                    <tr>
                        <td class="col-foto">
                            <img class="td-foto"
                                 src="{{ $k->foto ? Storage::url($k->foto) : url('/assets/bpbd.png') }}"
                                 alt="{{ $k->nama }}"
                                 onerror="this.src='{{ url('/assets/bpbd.png') }}'">
                        </td>
                        <td>
                            <span style="font-weight:600; color:#f1f5f9;">{{ $k->nama }}</span>
                            {{-- Jabatan tampil di bawah nama saat kolom jabatan hidden di mobile --}}
                            <div class="d-sm-none mt-1">
                                <span class="badge-jabatan">{{ optional($k->jabatan)->nama_jabatan ?? '-' }}</span>
                            </div>
                        </td>
                        <td class="col-jabatan">
                            <span class="badge-jabatan">{{ optional($k->jabatan)->nama_jabatan ?? '-' }}</span>
                        </td>
                        <td>
                            <a href="{{ waLink($k->no_hp) }}" target="_blank" rel="noopener" class="phone-link">
                                {{-- Ikon WhatsApp --}}
                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413z"/>
                                </svg>
                                {{ $k->no_hp }}
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div id="noResult" style="display:none;" class="no-data">Tidak ada kontak yang cocok.</div>
        @endif
    </div>

</main>

<footer style="border-top:1px solid rgba(31,41,55,1); margin-top:3rem; padding:1.5rem 0; font-size:.78rem; color:rgba(229,231,235,.55);">
    <div class="container d-flex flex-wrap justify-content-between gap-2">
        <span>BPBD Provinsi Sumatera Barat &copy; {{ date('Y') }}</span>
        <a href="/" style="color:rgba(125,211,252,.85); text-decoration:none;">← Kembali ke Direktori</a>
    </div>
</footer>

<script>
    const searchInput = document.getElementById('tableSearch');
    const table       = document.getElementById('kontakTable');
    const noResult    = document.getElementById('noResult');

    if (searchInput && table) {
        searchInput.addEventListener('input', function () {
            const q     = this.value.toLowerCase().trim();
            const rows  = table.querySelectorAll('tbody tr');
            let visible = 0;
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                const show = !q || text.includes(q);
                row.style.display = show ? '' : 'none';
                if (show) visible++;
            });
            noResult.style.display = visible === 0 ? '' : 'none';
        });
    }
</script>
</body>
</html>