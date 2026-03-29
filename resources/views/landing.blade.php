<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak BPBD Sumatera Barat</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Inter', system-ui, sans-serif;
            background: #0a0f1e;
            color: #e5e7eb;
        }

        /* ── HERO ───────────────────────────────── */
        .hero {
            background:
                radial-gradient(circle at top left,  #22d3ee33, transparent 55%),
                radial-gradient(circle at bottom right, #f9731633, transparent 55%),
                linear-gradient(180deg, #0d1b2e 0%, #0a0f1e 100%);
            padding: 4rem 0 3rem;
            border-bottom: 1px solid rgba(148,163,184,.1);
        }
        .hero-title {
            font-size: clamp(2rem, 3vw, 2.6rem);
            font-weight: 700;
            letter-spacing: -0.03em;
            line-height: 1.2;
        }
        .hero-subtitle {
            font-size: 0.95rem;
            color: rgba(229,231,235,.75);
            line-height: 1.65;
        }
        .hero-logo { width: min(380px, 80%); height: auto; filter: drop-shadow(0 18px 32px rgba(2,6,23,.7)); opacity: .95; }

        /* ── FILTER PANEL ───────────────────────── */
        .glass-panel {
            background: rgba(13,27,46,.85);
            border-radius: 1.25rem;
            border: 1px solid rgba(148,163,184,.25);
            box-shadow: 0 18px 40px rgba(2,6,23,.6);
            backdrop-filter: blur(8px);
        }
        .filter-label {
            font-size: 0.72rem;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: .16em;
            font-weight: 700;
        }
        .filter-control, .filter-input {
            background-color: #020617;
            border-radius: .75rem;
            border: 1px solid rgba(148,163,184,.18);
            color: #e5e7eb;
            font-size: 0.88rem;
        }
        .filter-control:focus, .filter-input:focus {
            border-color: #22d3ee;
            box-shadow: 0 0 0 1px rgba(34,211,238,.3);
            background-color: #020617;
            color: #e5e7eb;
        }
        .filter-control option { background-color: #020617; }
        .filter-input::placeholder { color: #475569; }

        /* ── SECTION TITLE ──────────────────────── */
        .section-title {
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: .18em;
            text-transform: uppercase;
            color: #475569;
        }

        /* ── WILAYAH CARD ───────────────────────── */
        .wilayah-card {
            border-radius: 1.15rem;
            border: 1px solid rgba(148,163,184,.18);
            background: linear-gradient(145deg, rgba(13,27,46,.9) 0%, rgba(10,15,30,.95) 100%);
            position: relative;
            overflow: hidden;
            transition: transform .18s ease, border-color .18s ease, box-shadow .18s ease;
            display: flex;
            flex-direction: column;
            height: 100%;
        }
        .wilayah-card:hover {
            transform: translateY(-3px);
            border-color: rgba(56,189,248,.5);
            box-shadow: 0 20px 50px rgba(2,6,23,.7), 0 0 0 1px rgba(56,189,248,.1);
        }
        /* Top accent bar */
        .wilayah-card::after {
            content: "";
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 4px;
            background: linear-gradient(90deg, rgba(var(--accent-rgb),.95), rgba(var(--accent-rgb),.15));
            pointer-events: none;
        }
        .kontak-card:nth-child(6n+1) .wilayah-card { --accent-rgb: 34,211,238; }
        .kontak-card:nth-child(6n+2) .wilayah-card { --accent-rgb: 34,197,94; }
        .kontak-card:nth-child(6n+3) .wilayah-card { --accent-rgb: 59,130,246; }
        .kontak-card:nth-child(6n+4) .wilayah-card { --accent-rgb: 168,85,247; }
        .kontak-card:nth-child(6n+5) .wilayah-card { --accent-rgb: 249,115,22; }
        .kontak-card:nth-child(6n+6) .wilayah-card { --accent-rgb: 236,72,153; }

        /* Card body */
        .card-body-inner {
            padding: 1.25rem 1.35rem;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        /* Header wilayah */
        .region-header {
            display: flex;
            align-items: center;
            gap: .85rem;
            margin-bottom: 1.1rem;
        }
        .region-logo {
            width: 46px; height: 46px;
            object-fit: contain;
            border-radius: 999px;
            background: rgba(255,255,255,.95);
            border: 1px solid rgba(148,163,184,.4);
            box-shadow: 0 6px 16px rgba(2,6,23,.4);
            flex-shrink: 0;
            padding: 2px;
        }
        .region-name {
            font-size: 1rem;
            font-weight: 700;
            color: #f1f5f9;
            letter-spacing: -.018em;
            line-height: 1.2;
        }
        .region-count {
            font-size: .75rem;
            color: #64748b;
            margin-top: .15rem;
        }

        /* Divider */
        .card-divider {
            border: none;
            border-top: 1px solid rgba(148,163,184,.12);
            margin: 0 0 1rem;
        }

        /* Kalaksa highlight */
        .kalaksa-block {
            display: flex;
            align-items: center;
            gap: .85rem;
            background: rgba(15,23,42,.6);
            border: 1px solid rgba(148,163,184,.18);
            border-radius: .85rem;
            padding: .75rem .9rem;
            margin-bottom: .85rem;
        }
        .kalaksa-photo {
            width: 52px; height: 52px;
            object-fit: cover;
            border-radius: .6rem;
            border: 2px solid rgba(148,163,184,.35);
            flex-shrink: 0;
        }
        .kalaksa-info { flex: 1; min-width: 0; }
        .kalaksa-role {
            font-size: .63rem;
            text-transform: uppercase;
            letter-spacing: .1em;
            color: rgb(var(--accent-rgb, 34,211,238));
            font-weight: 700;
            margin-bottom: .2rem;
        }
        .kalaksa-name {
            font-size: .92rem;
            font-weight: 700;
            color: #f1f5f9;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .kalaksa-phone {
            display: inline-flex;
            align-items: center;
            gap: .3rem;
            font-size: .75rem;
            color: #4ade80;
            text-decoration: none;
            margin-top: .2rem;
        }
        .kalaksa-phone:hover { color: #bbf7d0; text-decoration: underline; }

        /* Jabatan chip list */
        .jabatan-chips {
            display: flex;
            flex-wrap: wrap;
            gap: .4rem;
            margin-bottom: 1rem;
        }
        .chip {
            display: inline-flex;
            align-items: center;
            gap: .3rem;
            font-size: .7rem;
            font-weight: 600;
            padding: .22rem .65rem;
            border-radius: 999px;
            border: 1px solid;
            white-space: nowrap;
        }
        .chip-filled { background: rgba(var(--c),0.12); border-color: rgba(var(--c),0.38); color: rgb(var(--c)); }
        .chip-empty  { background: transparent; border-color: rgba(148,163,184,.2); color: #475569; }
        .chip-dot { width: 5px; height: 5px; border-radius: 50%; background: rgb(var(--c)); flex-shrink: 0; }

        /* Operator mini row */
        .operator-row {
            display: flex;
            gap: .5rem;
            flex-wrap: wrap;
            margin-bottom: 1rem;
        }
        .op-chip {
            display: inline-flex;
            align-items: center;
            gap: .35rem;
            background: rgba(15,23,42,.65);
            border: 1px solid rgba(148,163,184,.18);
            border-radius: .6rem;
            padding: .35rem .65rem;
            font-size: .72rem;
            color: #94a3b8;
            max-width: 100%;
        }
        .op-chip-avatar {
            width: 22px; height: 22px;
            border-radius: 50%;
            object-fit: cover;
            border: 1px solid rgba(148,163,184,.3);
            flex-shrink: 0;
        }
        .op-chip-name { font-weight: 600; color: #cbd5e1; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px; }
        .op-empty { font-size: .75rem; color: #334155; font-style: italic; }

        /* CTA Footer */
        .card-footer-inner {
            border-top: 1px solid rgba(148,163,184,.1);
            padding: .85rem 1.35rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: .5rem;
        }
        .footer-meta {
            font-size: .7rem;
            color: #475569;
        }
        .btn-detail {
            display: inline-flex;
            align-items: center;
            gap: .4rem;
            padding: .42rem 1rem;
            border-radius: 999px;
            font-size: .78rem;
            font-weight: 700;
            letter-spacing: .03em;
            border: 1px solid rgba(56,189,248,.45);
            background: rgba(56,189,248,.08);
            color: #7dd3fc;
            text-decoration: none;
            transition: all .16s ease;
            white-space: nowrap;
        }
        .btn-detail:hover {
            background: rgba(56,189,248,.2);
            border-color: rgba(56,189,248,.8);
            color: #e0f2fe;
            box-shadow: 0 4px 16px rgba(56,189,248,.18);
        }

        /* ── MISC ───────────────────────────────── */
        .btn-primary-soft {
            background: linear-gradient(to right, #22c55e, #16a34a);
            border: none;
            font-weight: 600;
            font-size: 0.9rem;
            border-radius: 999px;
            padding-inline: 1.3rem;
            color: #fff;
        }
        .btn-primary-soft:hover { background: linear-gradient(to right, #16a34a, #15803d); color:#fff; }
        .btn-outline-light-soft {
            border-radius: 999px;
            font-size: 0.88rem;
            border-color: rgba(148,163,184,.5);
            color: #e5e7eb;
        }
        .btn-outline-light-soft:hover { background-color: rgba(148,163,184,.12); color: #f9fafb; }
        .text-muted-soft { color: rgba(229,231,235,.65); }
        footer { border-top: 1px solid rgba(31,41,55,1); font-size: .8rem; color: rgba(229,231,235,.65); }
        .footer-link { color: rgba(125,211,252,.9); text-decoration: none; }
        .footer-link:hover { color: #fff; text-decoration: underline; }

        @media (max-width: 768px) {
            .hero { padding: 2.5rem 0 2rem; }
            .hero-logo { width: min(260px, 80%); }
        }
    </style>
</head>
<body>

{{-- ── HERO ── --}}
<header class="hero">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-lg-7">
                <span class="badge border border-info text-info mb-3 px-3 py-2"
                      style="border-radius:999px; font-size:.72rem; letter-spacing:.12em; text-transform:uppercase;">
                    Direktori Kontak Resmi BPBD
                </span>
                <h1 class="hero-title mb-3">
                    Kontak BPBD <span class="text-info">Sumatera Barat</span><br>
                    Kedaruratan &amp; Logistik
                </h1>
                <p class="hero-subtitle mb-4">
                    Direktori kontak resmi pejabat dan petugas BPBD seluruh wilayah Provinsi Sumatera Barat.
                    Gunakan untuk koordinasi kedaruratan dan dukungan logistik.
                </p>
                <div class="d-flex flex-wrap gap-2 align-items-center mb-2">
                    <a href="#daftar-kontak" class="btn btn-primary-soft">Lihat Daftar Kontak</a>
                    <a href="/dashboard" class="btn btn-outline-light-soft">Masuk Dashboard Admin</a>
                </div>
                <p class="text-muted-soft mb-0" style="font-size:.8rem;">
                    Data diambil langsung dari basis data internal. Ikuti arahan resmi saat keadaan darurat.
                </p>
            </div>
            <div class="col-lg-5 text-center">
                <img class="hero-logo" src="{{ url('/assets/bpbd.png') }}" alt="Logo BPBD Sumatera Barat">
            </div>
        </div>
    </div>
</header>

<main class="pb-5">

    {{-- ── FILTER ── --}}
    <section class="mb-5 mt-4">
        <div class="container">
            <div class="glass-panel p-3 p-md-4">
                <div class="d-flex flex-column flex-md-row align-items-md-end gap-3">
                    <div class="flex-grow-1">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="filter-label mb-1">Filter Wilayah</label>
                                <select id="filter-wilayah" class="form-select filter-control">
                                    <option value="">Semua wilayah</option>
                                    @foreach($wilayahList as $w)
                                        <option value="{{ $w->id }}">{{ $w->nama_wilayah }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="filter-label mb-1">Filter Jabatan</label>
                                <select id="filter-jabatan" class="form-select filter-control">
                                    <option value="">Semua jabatan</option>
                                    @foreach($jabatanList as $j)
                                        <option value="{{ $j->id }}">{{ $j->nama_jabatan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="filter-label mb-1">Pencarian Cepat</label>
                                <input id="filter-search" type="text" class="form-control filter-input"
                                       placeholder="Cari nama atau nomor HP">
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-column align-items-md-end flex-shrink-0">
                        <span class="filter-label mb-1">Ringkasan</span>
                        <div class="d-flex flex-wrap gap-2" style="font-size:.78rem;">
                            <span class="badge bg-dark border border-secondary text-secondary">{{ $wilayahList->count() }} Wilayah</span>
                            <span class="badge bg-dark border border-secondary text-secondary">{{ $jabatanList->count() }} Jabatan</span>
                            <span class="badge bg-dark border border-secondary text-secondary">{{ $kontak->count() }} Kontak</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ── DAFTAR KONTAK ── --}}
    <section id="daftar-kontak">
        <div class="container">
            <p class="section-title mb-3">Daftar Kontak per Wilayah</p>

            @php
                $grouped = $kontak->groupBy(fn($k) => optional($k->wilayah)->id ?: 'tanpa-wilayah');

                // Helper WA link sebagai Closure — dideklarasikan SEKALI di luar loop
                $waLink = function (string $hp): string {
                    $clean = preg_replace('/\D/', '', $hp);
                    if (str_starts_with($clean, '0'))   $clean = '62' . substr($clean, 1);
                    elseif (!str_starts_with($clean, '62')) $clean = '62' . $clean;
                    return 'https://wa.me/' . $clean;
                };
            @endphp

            <div class="row g-3 g-md-4" id="cards-container">
                @foreach($grouped as $wilayahId => $items)
                    @php
                        $wilayahNama    = optional($items->first()->wilayah)->nama_wilayah ?? 'Tanpa Wilayah';
                        $wilayahLogoUrl = optional($items->first()->wilayah)->foto
                            ? \Illuminate\Support\Facades\Storage::url(optional($items->first()->wilayah)->foto)
                            : url('/assets/bpbd.png');

                        $normalized = $items->map(function ($item) {
                            $role = \Illuminate\Support\Str::lower(trim(optional($item->jabatan)->nama_jabatan ?? ''));
                            if (in_array($role, ['kabid kl','kabid kedaruratan & logistik','kepala bidang kedaruratan & logistik']))
                                $role = 'kepala bidang kedaruratan & logistik';
                            elseif (in_array($role, ['kalaksa','kepala pelaksana']))
                                $role = 'kepala pelaksana';
                            elseif ($role === 'kasi kedarutan')
                                $role = 'kasi kedaruratan';
                            $item->role_normalized = $role;
                            return $item;
                        });

                        $kalaksa   = $normalized->firstWhere('role_normalized', 'kepala pelaksana');
                        $kabid     = $normalized->firstWhere('role_normalized', 'kepala bidang kedaruratan & logistik');
                        $kasiKed   = $normalized->firstWhere('role_normalized', 'kasi kedaruratan');
                        $kasiLog   = $normalized->firstWhere('role_normalized', 'kasi logistik');
                        $operators = $normalized->filter(fn($p) => in_array($p->role_normalized, ['operator pusdalops','operator database']))->values();

                        $allPersonIds = $normalized->map(fn($p) => [
                            'wilayah_id' => optional($p->wilayah)->id,
                            'jabatan_id' => optional($p->jabatan)->id,
                            'nama'       => \Illuminate\Support\Str::lower($p->nama),
                            'hp'         => \Illuminate\Support\Str::lower($p->no_hp),
                        ])->toArray();
                    @endphp

                    <div class="col-sm-6 col-xl-4 kontak-card"
                         data-wilayah-id="{{ $wilayahId !== 'tanpa-wilayah' ? $wilayahId : '' }}"
                         data-persons="{{ htmlspecialchars(json_encode($allPersonIds), ENT_QUOTES) }}">

                        <div class="wilayah-card">
                            {{-- ── Body ── --}}
                            <div class="card-body-inner">

                                {{-- Header --}}
                                <div class="region-header">
                                    <img class="region-logo" src="{{ $wilayahLogoUrl }}" alt="Logo {{ $wilayahNama }}">
                                    <div>
                                        <div class="region-name">{{ $wilayahNama }}</div>
                                        <div class="region-count">{{ $items->count() }} kontak terdaftar</div>
                                    </div>
                                </div>

                                <hr class="card-divider">

                                {{-- Kalaksa highlight --}}
                                <div class="kalaksa-block">
                                    <img class="kalaksa-photo"
                                         src="{{ $kalaksa && $kalaksa->foto ? \Illuminate\Support\Facades\Storage::url($kalaksa->foto) : url('/assets/bpbd.png') }}"
                                         alt="{{ $kalaksa ? $kalaksa->nama : 'Kalaksa' }}"
                                         onerror="this.src='{{ url('/assets/bpbd.png') }}'">
                                    <div class="kalaksa-info">
                                        <div class="kalaksa-role">Kepala Pelaksana</div>
                                        @if($kalaksa)
                                            <div class="kalaksa-name" title="{{ $kalaksa->nama }}">{{ $kalaksa->nama }}</div>
                                            <a href="{{ $waLink($kalaksa->no_hp) }}"
                                               target="_blank" rel="noopener"
                                               class="kalaksa-phone">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 24 24" fill="currentColor">
                                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413z"/>
                                                </svg>
                                                {{ $kalaksa->no_hp }}
                                            </a>
                                        @else
                                            <div class="kalaksa-name" style="color:#475569; font-style:italic; font-weight:400;">Belum ada data</div>
                                        @endif
                                    </div>
                                </div>

                                {{-- Jabatan chips --}}
                                <div class="jabatan-chips">
                                    @php
                                        $chipList = [
                                            ['label' => 'Kabid KL',       'person' => $kabid,   '--c' => '59,130,246'],
                                            ['label' => 'Kasi Kedaruratan','person' => $kasiKed, '--c' => '249,115,22'],
                                            ['label' => 'Kasi Logistik',  'person' => $kasiLog, '--c' => '34,197,94'],
                                        ];
                                    @endphp
                                    @foreach($chipList as $chip)
                                        @if($chip['person'])
                                            <span class="chip chip-filled" style="--c:{{ $chip['--c'] }}">
                                                <span class="chip-dot"></span>
                                                {{ $chip['label'] }}
                                            </span>
                                        @else
                                            <span class="chip chip-empty">
                                                {{ $chip['label'] }}
                                            </span>
                                        @endif
                                    @endforeach
                                </div>

                                {{-- Operator mini --}}
                                <div class="operator-row">
                                    @forelse($operators->take(3) as $op)
                                        <div class="op-chip">
                                            <img class="op-chip-avatar"
                                                 src="{{ $op->foto ? \Illuminate\Support\Facades\Storage::url($op->foto) : url('/assets/bpbd.png') }}"
                                                 alt="{{ $op->nama }}"
                                                 onerror="this.src='{{ url('/assets/bpbd.png') }}'">
                                            <span class="op-chip-name" title="{{ $op->nama }}">{{ $op->nama }}</span>
                                        </div>
                                    @empty
                                        <span class="op-empty">Belum ada operator</span>
                                    @endforelse
                                    @if($operators->count() > 3)
                                        <div class="op-chip">
                                            <span style="color:#64748b; font-size:.7rem;">+{{ $operators->count() - 3 }} lainnya</span>
                                        </div>
                                    @endif
                                </div>

                            </div>{{-- /card-body-inner --}}

                            {{-- ── Footer CTA ── --}}
                            <div class="card-footer-inner">
                                <span class="footer-meta">
                                    {{ $operators->count() }} operator terdaftar
                                </span>
                                <a href="{{ route('wilayah.detail', $wilayahId) }}" class="btn-detail">
                                    Lihat Semua Kontak
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2.5"
                                         stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14M12 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </div>

                        </div>{{-- /wilayah-card --}}
                    </div>{{-- /kontak-card --}}
                @endforeach

                @if($grouped->isEmpty())
                    <div class="col-12 text-center py-5" style="color:#475569;">
                        Belum ada data kontak yang tersimpan.
                    </div>
                @endif
            </div>{{-- /row --}}
        </div>
    </section>

</main>

<footer class="py-4 mt-4">
    <div class="container">
        <div class="row g-3">
            <div class="col-md-6">
                <div style="font-weight:600; color:rgba(249,250,251,.9); margin-bottom:.25rem;">BPBD Provinsi Sumatera Barat</div>
                <div>&copy; {{ date('Y') }} Direktori Kontak Kedaruratan &amp; Logistik.</div>
                <div style="margin-top:.25rem; color:rgba(229,231,235,.5);">
                    Akses admin: <a class="footer-link" href="/dashboard">Dashboard</a>
                </div>
            </div>
            <div class="col-md-6">
                <div style="font-weight:600; color:rgba(249,250,251,.9); margin-bottom:.25rem;">Catatan</div>
                <div>Data pada halaman ini bersifat informatif untuk koordinasi.</div>
                <div style="margin-top:.25rem; color:rgba(229,231,235,.5);">Untuk keadaan darurat, ikuti prosedur dan hubungi layanan resmi pemerintah daerah.</div>
            </div>
        </div>
    </div>
</footer>

<script>
(function () {
    const wilayahSel = document.getElementById('filter-wilayah');
    const jabatanSel = document.getElementById('filter-jabatan');
    const searchInp  = document.getElementById('filter-search');
    const cards      = Array.from(document.querySelectorAll('.kontak-card'));

    function applyFilter() {
        const wVal    = wilayahSel.value;
        const jVal    = jabatanSel.value;
        const keyword = searchInp.value.toLowerCase().trim();

        cards.forEach(card => {
            // Filter wilayah
            if (wVal && card.dataset.wilayahId !== wVal) {
                card.style.display = 'none'; return;
            }

            // Filter jabatan / keyword — cek dari persons JSON
            let persons = [];
            try { persons = JSON.parse(card.dataset.persons || '[]'); } catch(e) {}

            const hasMatch = persons.some(p => {
                if (jVal && String(p.jabatan_id) !== jVal) return false;
                if (keyword) {
                    const text = (p.nama + ' ' + p.hp).toLowerCase();
                    if (!text.includes(keyword)) return false;
                }
                return true;
            });

            card.style.display = (!jVal && !keyword) || hasMatch ? '' : 'none';
        });
    }

    wilayahSel.addEventListener('change', applyFilter);
    jabatanSel.addEventListener('change', applyFilter);
    searchInp.addEventListener('input', applyFilter);
})();
</script>
</body>
</html>