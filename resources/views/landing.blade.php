<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak BPBD Sumatera Barat</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        *, *::before, *::after { box-sizing: border-box; }

        :root {
            --bg:      #050c18;
            --border:  rgba(96,165,250,0.15);
            --cyan:    #38bdf8;
            --orange:  #fb923c;
            --green:   #4ade80;
            --text:    #e2eaf7;
            --muted:   rgba(180,200,230,0.6);
            --card-bg: rgba(10,22,46,0.85);
        }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'Inter', system-ui, sans-serif;
            background: #0a0f1e;
            color: var(--text);
            overflow-x: hidden;
            min-height: 100vh;
        }

        /* ── ANIMATED BG ── */
        .bg-layer {
            position: fixed; inset: 0; z-index: 0; pointer-events: none; overflow: hidden;
        }
        .bg-layer::before {
            content: ''; position: absolute;
            width: 900px; height: 900px; border-radius: 50%;
            background: radial-gradient(circle, rgba(56,189,248,0.10) 0%, transparent 70%);
            top: -300px; left: -200px;
            animation: driftA 18s ease-in-out infinite alternate;
        }
        .bg-layer::after {
            content: ''; position: absolute;
            width: 700px; height: 700px; border-radius: 50%;
            background: radial-gradient(circle, rgba(251,146,60,0.08) 0%, transparent 70%);
            bottom: -200px; right: -150px;
            animation: driftB 22s ease-in-out infinite alternate;
        }
        .bg-grid {
            position: fixed; inset: 0; z-index: 0; pointer-events: none;
            background-image: radial-gradient(circle, rgba(96,165,250,0.18) 1px, transparent 1px);
            background-size: 40px 40px;
            mask-image: radial-gradient(ellipse 80% 80% at 50% 50%, black 30%, transparent 100%);
            opacity: 0.3;
        }
        @keyframes driftA { to { transform: translate(80px,60px) scale(1.15); } }
        @keyframes driftB { to { transform: translate(-70px,-50px) scale(1.1); } }

        /* ── NAVBAR ── */
        nav.main-nav {
            position: sticky; top: 0; z-index: 200;
            background: rgba(5,12,24,0.80);
            backdrop-filter: blur(20px) saturate(180%);
            border-bottom: 1px solid var(--border);
            padding: 0.85rem 0;
        }
        .nav-inner {
            max-width: 1200px; margin: 0 auto; padding: 0 2rem;
            display: flex; align-items: center; justify-content: space-between; gap: 1rem;
        }
        .nav-brand {
            font-weight: 800; font-size: 1.15rem; color: #fff;
            text-decoration: none; display: flex; align-items: center; gap: 0.6rem;
            letter-spacing: -0.02em;
        }
        .brand-dot {
            width: 9px; height: 9px; border-radius: 50%;
            background: var(--cyan); box-shadow: 0 0 8px var(--cyan);
            animation: pulse 2s ease-in-out infinite;
        }
        @keyframes pulse { 0%,100%{opacity:1;transform:scale(1)} 50%{opacity:.55;transform:scale(0.85)} }
        .nav-links { display: flex; align-items: center; gap: 0.4rem; list-style: none; margin: 0; padding: 0; }
        .nav-links a {
            color: var(--muted); text-decoration: none; font-size: 0.9rem; font-weight: 500;
            padding: 0.45rem 0.9rem; border-radius: 0.5rem; transition: color .2s, background .2s;
        }
        .nav-links a:hover { color: var(--text); background: rgba(96,165,250,0.1); }
        .nav-links a.active { color: var(--cyan); background: rgba(56,189,248,0.08); }
        .nav-links .btn-login {
            background: rgba(56,189,248,0.12); border: 1px solid rgba(56,189,248,0.35);
            color: var(--cyan); font-weight: 600;
        }
        .nav-links .btn-login:hover { background: rgba(56,189,248,0.22); color: #fff; }
        .hamburger {
            display: none; flex-direction: column; gap: 5px;
            cursor: pointer; padding: 4px; background: none; border: none;
        }
        .hamburger span { width: 24px; height: 2px; background: var(--muted); border-radius: 2px; transition: .3s; }
        .hamburger.open span:nth-child(1) { transform: rotate(45deg) translate(5px,5px); }
        .hamburger.open span:nth-child(2) { opacity: 0; }
        .hamburger.open span:nth-child(3) { transform: rotate(-45deg) translate(5px,-5px); }

        /* ── HERO ── */
        .hero {
            position: relative; z-index: 1;
            background:
                radial-gradient(circle at top left,  rgba(34,211,238,0.12), transparent 55%),
                radial-gradient(circle at bottom right, rgba(249,115,22,0.10), transparent 55%),
                linear-gradient(180deg, #0d1b2e 0%, #0a0f1e 100%);
            padding: 4rem 0 3rem;
            border-bottom: 1px solid rgba(148,163,184,.08);
        }
        .hero-title {
            font-size: clamp(2rem, 3vw, 2.6rem);
            font-weight: 800; letter-spacing: -0.03em; line-height: 1.2;
        }
        .hero-subtitle { font-size: 0.95rem; color: var(--muted); line-height: 1.7; }
        .hero-logo {
            width: min(340px, 80%); height: auto;
            filter: drop-shadow(0 18px 32px rgba(2,6,23,.7));
            opacity: .95; animation: floatY 5s ease-in-out infinite alternate;
        }
        @keyframes floatY { from{transform:translateY(0)} to{transform:translateY(-12px)} }
        .hero-badge {
            display: inline-flex; align-items: center; gap: 0.5rem;
            background: rgba(56,189,248,0.08); border: 1px solid rgba(56,189,248,0.3);
            color: var(--cyan); font-size: 0.75rem; font-weight: 600;
            letter-spacing: 0.08em; text-transform: uppercase;
            padding: 0.4rem 1rem; border-radius: 999px; margin-bottom: 1.25rem; width: fit-content;
        }
        .badge-ring {
            width: 7px; height: 7px; border-radius: 50%;
            background: var(--cyan); box-shadow: 0 0 6px var(--cyan);
            animation: pulse 1.8s ease-in-out infinite;
        }

        /* ── BUTTONS ── */
        .btn-primary-soft {
            background: linear-gradient(to right, #22c55e, #16a34a);
            border: none; font-weight: 700; font-size: 0.9rem;
            border-radius: 999px; padding: 0.55rem 1.3rem; color: #fff;
            display: inline-flex; align-items: center; gap: 0.4rem;
            transition: box-shadow .2s, transform .18s;
        }
        .btn-primary-soft:hover {
            background: linear-gradient(to right, #16a34a, #15803d);
            color: #fff; transform: translateY(-2px); box-shadow: 0 6px 20px rgba(34,197,94,0.4);
        }
        .btn-ghost-soft {
            border-radius: 999px; font-size: 0.88rem; font-weight: 600;
            border: 1px solid rgba(148,163,184,.4); color: #e5e7eb;
            padding: 0.55rem 1.2rem; background: rgba(255,255,255,0.04);
            display: inline-flex; align-items: center; gap: 0.4rem; transition: .2s;
        }
        .btn-ghost-soft:hover { background: rgba(255,255,255,0.09); color: #fff; }
        .btn-warning-soft {
            border-radius: 999px; font-size: 0.88rem; font-weight: 700;
            border: 1px solid rgba(251,191,36,0.5); color: #fbbf24;
            padding: 0.55rem 1.2rem; background: rgba(251,191,36,0.08);
            display: inline-flex; align-items: center; gap: 0.4rem; transition: .2s;
        }
        .btn-warning-soft:hover { background: rgba(251,191,36,0.18); color: #fff; }

        /* ── FILTER PANEL ── */
        .glass-panel {
            position: relative; z-index: 1;
            background: rgba(10,22,46,0.85);
            border-radius: 1.25rem; border: 1px solid rgba(148,163,184,.2);
            box-shadow: 0 18px 40px rgba(2,6,23,.55); backdrop-filter: blur(10px);
        }
        .filter-label {
            font-size: 0.72rem; color: #64748b;
            text-transform: uppercase; letter-spacing: .16em; font-weight: 700;
        }
        .filter-control, .filter-input {
            background-color: #020617; border-radius: .75rem;
            border: 1px solid rgba(148,163,184,.18); color: #e5e7eb; font-size: 0.88rem;
        }
        .filter-control:focus, .filter-input:focus {
            border-color: #22d3ee; box-shadow: 0 0 0 2px rgba(34,211,238,.2);
            background-color: #020617; color: #e5e7eb;
        }
        .filter-control option { background-color: #020617; }
        .filter-input::placeholder { color: #475569; }

        /* ── SECTION TITLE ── */
        .section-eyebrow {
            font-size: 0.7rem; font-weight: 700; letter-spacing: .18em;
            text-transform: uppercase; color: var(--cyan); margin-bottom: 0.35rem;
        }
        .section-heading {
            font-size: 1.5rem; font-weight: 800; color: #f0f8ff; letter-spacing: -0.03em;
        }

        /* ── WILAYAH CARD ── */
        .wilayah-card {
            border-radius: 1.15rem; border: 1px solid rgba(148,163,184,.18);
            background: linear-gradient(145deg, rgba(13,27,46,.92) 0%, rgba(10,15,30,.97) 100%);
            position: relative; overflow: hidden;
            transition: transform .2s ease, border-color .2s ease, box-shadow .2s ease;
            display: flex; flex-direction: column; height: 100%;
        }
        .wilayah-card:hover {
            transform: translateY(-4px);
            border-color: rgba(56,189,248,.5);
            box-shadow: 0 20px 50px rgba(2,6,23,.7), 0 0 0 1px rgba(56,189,248,.08);
        }
        .wilayah-card::after {
            content: ""; position: absolute; top: 0; left: 0; right: 0; height: 3px;
            background: linear-gradient(90deg, rgba(var(--accent-rgb),.95), rgba(var(--accent-rgb),.1));
            pointer-events: none;
        }
        .kontak-card:nth-child(6n+1) .wilayah-card { --accent-rgb: 34,211,238; }
        .kontak-card:nth-child(6n+2) .wilayah-card { --accent-rgb: 34,197,94; }
        .kontak-card:nth-child(6n+3) .wilayah-card { --accent-rgb: 59,130,246; }
        .kontak-card:nth-child(6n+4) .wilayah-card { --accent-rgb: 168,85,247; }
        .kontak-card:nth-child(6n+5) .wilayah-card { --accent-rgb: 249,115,22; }
        .kontak-card:nth-child(6n+6) .wilayah-card { --accent-rgb: 236,72,153; }

        .card-body-inner { padding: 1.25rem 1.35rem; flex: 1; display: flex; flex-direction: column; }

        .region-header { display: flex; align-items: center; gap: .85rem; margin-bottom: 1.1rem; }
        .region-logo {
            width: 46px; height: 46px; object-fit: contain; border-radius: 999px;
            background: rgba(255,255,255,.95); border: 1px solid rgba(148,163,184,.4);
            box-shadow: 0 6px 16px rgba(2,6,23,.4); flex-shrink: 0; padding: 2px;
        }
        .region-name { font-size: 1rem; font-weight: 700; color: #f1f5f9; letter-spacing: -.018em; line-height: 1.2; }
        .region-count { font-size: .75rem; color: #64748b; margin-top: .15rem; }
        .card-divider { border: none; border-top: 1px solid rgba(148,163,184,.1); margin: 0 0 1rem; }

        /* Kalaksa — tanpa nomor HP */
        .kalaksa-block {
            display: flex; align-items: center; gap: .85rem;
            background: rgba(15,23,42,.6); border: 1px solid rgba(148,163,184,.18);
            border-radius: .85rem; padding: .75rem .9rem; margin-bottom: .85rem;
        }
        .kalaksa-photo {
            width: 52px; height: 52px; object-fit: cover; border-radius: .6rem;
            border: 2px solid rgba(148,163,184,.35); flex-shrink: 0;
        }
        .kalaksa-info { flex: 1; min-width: 0; }
        .kalaksa-role {
            font-size: .63rem; text-transform: uppercase; letter-spacing: .1em;
            color: rgb(var(--accent-rgb, 34,211,238)); font-weight: 700; margin-bottom: .2rem;
        }
        .kalaksa-name {
            font-size: .92rem; font-weight: 700; color: #f1f5f9;
            white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
        }
        /* Lock badge — menggantikan nomor HP */
        .kalaksa-lock {
            display: inline-flex; align-items: center; gap: .3rem;
            font-size: .72rem; color: #64748b; margin-top: .25rem;
            background: rgba(15,23,42,0.7); border: 1px solid rgba(148,163,184,.15);
            border-radius: 999px; padding: .18rem .65rem; width: fit-content;
        }
        .kalaksa-lock svg { flex-shrink: 0; }

        .jabatan-chips { display: flex; flex-wrap: wrap; gap: .4rem; margin-bottom: 1rem; }
        .chip {
            display: inline-flex; align-items: center; gap: .3rem;
            font-size: .7rem; font-weight: 600; padding: .22rem .65rem;
            border-radius: 999px; border: 1px solid; white-space: nowrap;
        }
        .chip-filled { background: rgba(var(--c),0.12); border-color: rgba(var(--c),0.38); color: rgb(var(--c)); }
        .chip-empty  { background: transparent; border-color: rgba(148,163,184,.2); color: #475569; }
        .chip-dot { width: 5px; height: 5px; border-radius: 50%; background: rgb(var(--c)); flex-shrink: 0; }

        .operator-row { display: flex; gap: .5rem; flex-wrap: wrap; margin-bottom: 1rem; }
        .op-chip {
            display: inline-flex; align-items: center; gap: .35rem;
            background: rgba(15,23,42,.65); border: 1px solid rgba(148,163,184,.18);
            border-radius: .6rem; padding: .35rem .65rem; font-size: .72rem; color: #94a3b8; max-width: 100%;
        }
        .op-chip-avatar { width: 22px; height: 22px; border-radius: 50%; object-fit: cover; border: 1px solid rgba(148,163,184,.3); flex-shrink: 0; }
        .op-chip-name { font-weight: 600; color: #cbd5e1; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px; }
        .op-empty { font-size: .75rem; color: #334155; font-style: italic; }

        .card-footer-inner {
            border-top: 1px solid rgba(148,163,184,.1);
            padding: .85rem 1.35rem;
            display: flex; align-items: center; justify-content: space-between; gap: .5rem;
        }
        .footer-meta { font-size: .7rem; color: #475569; }

        /* Detail button — selalu tampil lock saat belum login */
        .btn-detail {
            display: inline-flex; align-items: center; gap: .4rem;
            padding: .42rem 1rem; border-radius: 999px;
            font-size: .78rem; font-weight: 700; letter-spacing: .03em;
            border: 1px solid rgba(56,189,248,.45); background: rgba(56,189,248,.08);
            color: #7dd3fc; text-decoration: none; transition: all .18s ease; white-space: nowrap;
            cursor: pointer;
        }
        .btn-detail:hover {
            background: rgba(56,189,248,.2); border-color: rgba(56,189,248,.8);
            color: #e0f2fe; box-shadow: 0 4px 16px rgba(56,189,248,.18);
        }

        /* ── LOGIN MODAL ── */
        .modal-overlay {
            display: none; position: fixed; inset: 0; z-index: 9999;
            background: rgba(2,6,23,0.75); backdrop-filter: blur(8px);
            align-items: center; justify-content: center;
        }
        .modal-overlay.show { display: flex; animation: fadeIn .2s ease; }
        @keyframes fadeIn { from{opacity:0} to{opacity:1} }
        .modal-box {
            background: linear-gradient(145deg, rgba(13,27,46,0.98), rgba(10,15,30,0.99));
            border: 1px solid rgba(56,189,248,0.3); border-radius: 1.4rem;
            padding: 2.2rem 2rem; max-width: 400px; width: 90%;
            box-shadow: 0 32px 80px rgba(2,6,23,0.85);
            animation: slideUp .25s ease;
            position: relative;
        }
        @keyframes slideUp { from{transform:translateY(20px);opacity:0} to{transform:translateY(0);opacity:1} }
        .modal-close {
            position: absolute; top: 1rem; right: 1.1rem;
            background: none; border: none; color: #64748b; font-size: 1.2rem;
            cursor: pointer; line-height: 1; transition: color .2s;
        }
        .modal-close:hover { color: #e5e7eb; }
        .modal-icon {
            width: 56px; height: 56px; border-radius: 1rem; margin: 0 auto 1.1rem;
            background: rgba(56,189,248,0.1); border: 1px solid rgba(56,189,248,0.3);
            display: flex; align-items: center; justify-content: center; font-size: 1.6rem;
        }
        .modal-title { font-size: 1.15rem; font-weight: 800; color: #f0f8ff; text-align: center; margin-bottom: .4rem; letter-spacing: -.02em; }
        .modal-sub { font-size: .85rem; color: var(--muted); text-align: center; margin-bottom: 1.6rem; line-height: 1.6; }
        .modal-actions { display: flex; flex-direction: column; gap: .75rem; }
        .btn-modal-login {
            background: linear-gradient(135deg, #22c55e, #16a34a);
            border: none; color: #fff; font-weight: 700; font-size: .92rem;
            border-radius: .75rem; padding: .75rem; cursor: pointer; width: 100%;
            transition: transform .18s, box-shadow .18s; display: flex; align-items: center; justify-content: center; gap: .5rem;
        }
        .btn-modal-login:hover { transform: translateY(-2px); box-shadow: 0 8px 24px rgba(34,197,94,0.4); }
        .btn-modal-cancel {
            background: rgba(255,255,255,0.05); border: 1px solid rgba(148,163,184,.25);
            color: var(--muted); font-weight: 600; font-size: .88rem;
            border-radius: .75rem; padding: .65rem; cursor: pointer; width: 100%; transition: .2s;
        }
        .btn-modal-cancel:hover { background: rgba(255,255,255,0.1); color: #fff; }
        .modal-divider { border: none; border-top: 1px solid rgba(148,163,184,.12); margin: .5rem 0; }

        /* ── ORG STYLES ── */
        .org-wrap {
            border-radius: 1.15rem; border: 1px solid rgba(34,211,238,0.4);
            background: linear-gradient(145deg, rgba(13,27,46,0.95), rgba(10,15,30,0.98));
            position: relative; overflow: hidden;
        }
        .org-wrap::after {
            content: ""; position: absolute; top: 0; left: 0; right: 0; height: 3px;
            background: linear-gradient(90deg, rgba(34,211,238,.95), rgba(34,211,238,.1));
            pointer-events: none;
        }
        .org-hdr {
            padding: .95rem 1.4rem .85rem;
            display: flex; align-items: center; gap: .9rem;
            border-bottom: 1px solid rgba(148,163,184,.12);
        }
        .org-hdr-icon {
            width: 40px; height: 40px; border-radius: 50%;
            background: rgba(255,255,255,.93); border: 1px solid rgba(148,163,184,.35);
            display: flex; align-items: center; justify-content: center; flex-shrink: 0; padding: 2px;
        }
        .org-hdr-icon img { width: 100%; height: 100%; object-fit: contain; border-radius: 50%; }
        .org-hdr-title { font-size: .95rem; font-weight: 700; color: #f1f5f9; }
        .org-hdr-sub   { font-size: .68rem; color: #64748b; margin-top: 2px; }
        .org-bdy { padding: 1.4rem 1.2rem 1.5rem; overflow-x: auto; }
        .on {
            background: #f59e0b; color: #1c1008; border: 1.5px solid #d97706; border-radius: 9px;
            padding: 7px 11px; font-size: .68rem; font-weight: 700; display: flex; flex-direction: column;
        }
        .on-c { align-items: center; text-align: center; }
        .on-l { align-items: flex-start; text-align: left; }
        .on-oval {
            background: #f59e0b; color: #1c1008; border: 1.5px solid #d97706; border-radius: 20px;
            padding: 7px 16px; font-size: .68rem; font-weight: 700;
            text-align: center; white-space: nowrap; display: inline-flex; align-items: center;
        }
        .on-pill {
            background: rgba(251,191,36,.13); color: #fbbf24;
            border: 1px solid rgba(251,191,36,.4); border-radius: 20px;
            padding: 6px 18px; font-size: .68rem; font-weight: 700;
            text-align: center; white-space: nowrap; display: inline-flex; align-items: center;
        }
        .on-role { font-size: .56rem; font-weight: 700; opacity: .7; text-transform: uppercase; letter-spacing: .06em; margin-bottom: 1px; }
        .on-name { font-size: .73rem; font-weight: 700; line-height: 1.25; }
        .on-nip  { font-size: .55rem; font-weight: 400; opacity: .6; margin-top: 1px; }
        .org-ph {
            width: 38px; height: 46px; border-radius: 6px; overflow: hidden;
            background: rgba(30,50,80,.7); border: 1px solid rgba(148,163,184,.2); flex-shrink: 0;
        }
        .org-ph img { width: 100%; height: 100%; object-fit: cover; display: block; }
        .org-nwp { display: flex; align-items: center; gap: 8px; }
        .org-vl { width: 2px; background: rgba(148,163,184,.35); flex-shrink: 0; align-self: center; }
        .org-hl { height: 2px; background: rgba(148,163,184,.35); flex-shrink: 0; }

        /* ── FOOTER ── */
        footer.main-footer {
            position: relative; z-index: 1;
            border-top: 1px solid rgba(56,189,248,0.1);
            background: rgba(5,12,24,0.7); backdrop-filter: blur(10px);
        }
        .footer-inner {
            max-width: 1200px; margin: 0 auto; padding: 2.5rem 2rem;
            display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 2rem;
        }
        .footer-brand { font-weight: 800; font-size: 1rem; color: #fff; margin-bottom: 0.5rem; }
        .footer-brand-sub { font-size: 0.82rem; color: var(--muted); line-height: 1.6; }
        .footer-col h4 {
            font-size: 0.78rem; font-weight: 700; letter-spacing: 0.1em;
            text-transform: uppercase; color: var(--muted); margin-bottom: 0.85rem;
        }
        .footer-col a {
            display: block; color: rgba(180,200,230,0.55); text-decoration: none;
            font-size: 0.86rem; margin-bottom: 0.5rem; transition: color .2s;
        }
        .footer-col a:hover { color: var(--cyan); }
        .footer-bottom {
            border-top: 1px solid rgba(56,189,248,0.08);
            padding: 1.1rem 2rem; max-width: 1200px; margin: 0 auto;
            display: flex; justify-content: space-between; gap: 1rem;
            flex-wrap: wrap; font-size: 0.8rem; color: rgba(180,200,230,0.4);
        }
        .status-dot {
            display: inline-block; width: 6px; height: 6px; border-radius: 50%;
            background: var(--green); box-shadow: 0 0 6px var(--green); margin-right: 5px;
            animation: pulse 2s ease-in-out infinite;
        }

        /* fade-up */
        .fade-up { opacity: 0; transform: translateY(24px); transition: opacity .6s ease, transform .6s ease; }
        .fade-up.visible { opacity: 1; transform: translateY(0); }

        @media (max-width: 900px) {
            .footer-inner { grid-template-columns: 1fr; gap: 1.5rem; }
            .footer-bottom { flex-direction: column; gap: .5rem; }
        }
        @media (max-width: 600px) {
            .nav-links { display: none; flex-direction: column; }
            .nav-links.open {
                display: flex; position: absolute; top: 100%; left: 0; right: 0;
                background: rgba(5,12,24,0.98); padding: 1rem 2rem;
                border-bottom: 1px solid var(--border);
            }
            .hamburger { display: flex; }
            .hero { padding: 2.5rem 0 2rem; }
            .footer-inner { padding: 1.5rem 1.25rem; }
        }
    </style>
</head>
<body>

<div class="bg-layer"></div>
<div class="bg-grid"></div>

{{-- ── LOGIN REQUIRED MODAL ── --}}
<div class="modal-overlay" id="loginModal">
    <div class="modal-box">
        <button class="modal-close" onclick="closeModal()" aria-label="Tutup">&times;</button>
        <div class="modal-icon">🔒</div>
        <div class="modal-title">Login Diperlukan</div>
        <div class="modal-sub">
            Untuk melihat detail kontak wilayah, Anda perlu masuk terlebih dahulu menggunakan akun BPBD Anda.
        </div>
        <hr class="modal-divider">
        <div class="modal-actions">
            <button class="btn-modal-login" id="modalLoginBtn" onclick="goToLogin()">
                🔑 Masuk Sekarang
            </button>
            <button class="btn-modal-cancel" onclick="closeModal()">Batal, Kembali</button>
        </div>
    </div>
</div>

{{-- ── NAVBAR ── --}}
<nav class="main-nav">
    <div class="nav-inner">
        <a class="nav-brand" href="/">
            <div class="brand-dot"></div>
            Direktori Kontak
        </a>

        <button class="hamburger" id="hamburger" aria-label="Menu">
            <span></span><span></span><span></span>
        </button>

        <ul class="nav-links" id="navLinks">
            <li><a href="/kontak-wilayah" class="active">Direktori Kontak</a></li>
            <li><a href="/sirine">Kontrol Sirine</a></li>

@auth
    <span class="me-2">Halo, {{ auth()->user()->name }}</span>

    <form action="/logout" method="POST" style="display:inline;">
        @csrf
        <button class="btn btn-outline-danger btn-sm">Logout</button>
    </form>
@else
    <a href="/login" class="btn btn-outline-light btn-sm">Login</a>
@endauth
        </ul>
    </div>
</nav>

{{-- ── HERO ── --}}
<header class="hero">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-lg-7 fade-up">
                <div class="hero-badge">
                    <div class="badge-ring"></div>
                    Direktori Kontak Resmi BPBD
                </div>
                <h1 class="hero-title mb-3">
                    Kontak BPBD <span style="color:var(--cyan)">Sumatera Barat</span><br>
                    Kedaruratan &amp; Logistik
                </h1>
                <p class="hero-subtitle mb-4">
                    Direktori kontak resmi pejabat dan petugas BPBD seluruh wilayah Provinsi Sumatera Barat.
                    Gunakan untuk koordinasi kedaruratan dan dukungan logistik.
                </p>
                <p style="font-size:.8rem;color:rgba(229,231,235,.5);margin-top:.75rem;">
                    Data diambil dari basis data internal. Detail kontak hanya tersedia setelah login.
                </p>
            </div>
            <div class="col-lg-5 text-center fade-up">
                <img class="hero-logo" src="{{ url('/assets/bpbd.png') }}" alt="Logo BPBD Sumatera Barat">
            </div>
        </div>
    </div>
</header>

<main class="pb-5" style="position:relative;z-index:1;">

    {{-- ── FILTER ── --}}
    <section class="mb-5 mt-4">
        <div class="container fade-up">
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
                                       placeholder="Cari nama wilayah...">
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
            <div class="mb-4">
                <div class="section-eyebrow">Daftar Wilayah</div>
                <h2 class="section-heading">Kontak per Wilayah</h2>
            </div>

            @php
                $grouped = $kontak->groupBy(fn($k) => optional($k->wilayah)->id ?: 'tanpa-wilayah');

                $pusatWilayahId = null;
                foreach ($grouped as $gwId => $gItems) {
                    $n = \Illuminate\Support\Str::lower(trim(optional($gItems->first()->wilayah)->nama_wilayah ?? ''));
                    if ($n === 'provinsi sumatera barat') { $pusatWilayahId = $gwId; break; }
                }
            @endphp

            <div class="row g-3 g-md-4" id="cards-container">

                {{-- ══ STRUKTUR ORGANISASI CARD ══ --}}
{{-- ══ STRUKTUR ORGANISASI CARD ══ --}}
@if($pusatWilayahId !== null)
@php
    $pusatItems = $grouped[$pusatWilayahId];

    $normalizedPusat = $pusatItems->map(function ($item) {
        $role = \Illuminate\Support\Str::lower(trim(optional($item->jabatan)->nama_jabatan ?? ''));
        $item->role_normalized = $role;
        return $item;
    });

    // Petakan berdasarkan role
    $orgKepala    = $normalizedPusat->first(fn($p) => str_contains($p->role_normalized, 'kepala pelaksana') || str_contains($p->role_normalized, 'kalaksa'));
    $orgSekretaris= $normalizedPusat->first(fn($p) => str_contains($p->role_normalized, 'sekretaris') && !str_contains($p->role_normalized, 'sub'));
    $orgSubKeu    = $normalizedPusat->first(fn($p) => str_contains($p->role_normalized, 'keuangan'));
    $orgBidPencegahan  = $normalizedPusat->first(fn($p) => str_contains($p->role_normalized, 'pencegahan'));
    $orgBidKedaruratan = $normalizedPusat->first(fn($p) => str_contains($p->role_normalized, 'kedaruratan') && str_contains($p->role_normalized, 'kepala bidang'));
    $orgBidRehabilitasi= $normalizedPusat->first(fn($p) => str_contains($p->role_normalized, 'rehabilitasi'));

    // Helper closure untuk foto
    $fotoUrl = fn($person) => ($person && $person->foto)
        ? \Illuminate\Support\Facades\Storage::url($person->foto)
        : url('/assets/bpbd.png');
@endphp

<div class="col-12 kontak-card fade-up org-card">
    <div class="org-wrap">
        <div class="org-hdr">
            <div class="org-hdr-icon">
                <img src="{{ url('/assets/bpbd.png') }}" alt="Logo BPBD">
            </div>
            <div>
                <div class="org-hdr-title">Struktur Organisasi BPBD Sumatera Barat</div>
                <div class="org-hdr-sub">Tampilan Struktur Resmi</div>
            </div>
        </div>
        <div class="org-bdy">
        <div style="min-width:700px;display:flex;flex-direction:column;align-items:center;">

            {{-- Kepala (Ex-Officio / Sekda) - biasanya statis --}}
            <div class="on on-c" style="width:170px;">
                <div class="on-role">Kepala</div>
                <div class="on-name">Sekretaris Daerah</div>
                <div class="on-nip">(Ex-Officio)</div>
            </div>

            <div class="org-vl" style="height:18px;"></div>

            <div style="display:flex;flex-direction:row;align-items:flex-start;justify-content:center;">

                {{-- Kiri: Unsur Pengarah --}}
                <div style="display:flex;flex-direction:column;align-items:flex-end;">
                    <div class="org-hl" style="width:70px;margin-top:21px;"></div>
                    <div class="org-vl" style="height:16px;align-self:flex-end;"></div>
                    <div class="on-oval">Unsur Pengarah</div>
                </div>

                {{-- Tengah: Kepala Pelaksana ke bawah --}}
                <div style="display:flex;flex-direction:column;align-items:center;">

                    {{-- Kepala Pelaksana --}}
                    <div class="org-nwp">
                        <div class="on on-c" style="width:200px;">
                            <div class="on-role">Kepala Pelaksana</div>
                            <div class="on-name">{{ $orgKepala?->nama ?? 'Belum ada data' }}</div>
                            <div class="on-nip">{{ $orgKepala?->nip ? 'Nip. '.$orgKepala->nip : '' }}</div>
                        </div>
                        <div class="org-ph">
                            <img src="{{ $fotoUrl($orgKepala) }}" alt="Kepala Pelaksana">
                        </div>
                    </div>

                    <div class="org-vl" style="height:18px;"></div>

                    <div style="display:flex;flex-direction:row;align-items:flex-start;align-self:flex-end;">
                        <div class="org-hl" style="width:40px;margin-top:21px;"></div>
                        <div style="display:flex;flex-direction:column;align-items:flex-start;">

                            {{-- Sekretaris --}}
                            <div class="org-nwp">
                                <div class="on on-l" style="width:170px;">
                                    <div class="on-role">Sekretaris</div>
                                    <div class="on-name">{{ $orgSekretaris?->nama ?? 'Belum ada data' }}</div>
                                    <div class="on-nip">{{ $orgSekretaris?->nip ? 'Nip. '.$orgSekretaris->nip : '' }}</div>
                                </div>
                                <div class="org-ph">
                                    <img src="{{ $fotoUrl($orgSekretaris) }}" alt="Sekretaris">
                                </div>
                            </div>

                            <div class="org-vl" style="height:14px;"></div>

                            {{-- Sub Bagian Keuangan --}}
                            <div class="org-nwp">
                                <div class="on on-l" style="width:170px;">
                                    <div class="on-role">Sub Bagian Keuangan</div>
                                    <div class="on-name">{{ $orgSubKeu?->nama ?? 'Belum ada data' }}</div>
                                    <div class="on-nip">{{ $orgSubKeu?->nip ? 'Nip. '.$orgSubKeu->nip : '' }}</div>
                                </div>
                                <div class="org-ph">
                                    <img src="{{ $fotoUrl($orgSubKeu) }}" alt="Sub Bag Keuangan">
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="org-vl" style="height:18px;"></div>

                    {{-- Tiga Kepala Bidang --}}
                    <div style="display:flex;flex-direction:row;align-items:flex-start;gap:12px;">

                        <div class="org-nwp" style="align-items:flex-start;">
                            <div class="on on-l" style="width:138px;">
                                <div class="on-role">Kepala Bidang</div>
                                <div class="on-name">Pencegahan dan Kesiapsiagaan</div>
                                <div class="on-nip">{{ $orgBidPencegahan?->nama ?? 'Belum ada data' }}</div>
                                <div class="on-nip">{{ $orgBidPencegahan?->nip ? 'Nip. '.$orgBidPencegahan->nip : '' }}</div>
                            </div>
                            <div class="org-ph">
                                <img src="{{ $fotoUrl($orgBidPencegahan) }}" alt="Kabid Pencegahan">
                            </div>
                        </div>

                        <div class="org-nwp" style="align-items:flex-start;">
                            <div class="on on-l" style="width:138px;">
                                <div class="on-role">Kepala Bidang</div>
                                <div class="on-name">Kedaruratan dan Logistik</div>
                                <div class="on-nip">{{ $orgBidKedaruratan?->nama ?? 'Belum ada data' }}</div>
                                <div class="on-nip">{{ $orgBidKedaruratan?->nip ? 'Nip. '.$orgBidKedaruratan->nip : '' }}</div>
                            </div>
                            <div class="org-ph">
                                <img src="{{ $fotoUrl($orgBidKedaruratan) }}" alt="Kabid KL">
                            </div>
                        </div>

                        <div class="org-nwp" style="align-items:flex-start;">
                            <div class="on on-l" style="width:138px;">
                                <div class="on-role">Kepala Bidang</div>
                                <div class="on-name">Rehabilitasi dan Rekonstruksi</div>
                                <div class="on-nip">{{ $orgBidRehabilitasi?->nama ?? 'Belum ada data' }}</div>
                                <div class="on-nip">{{ $orgBidRehabilitasi?->nip ? 'Nip. '.$orgBidRehabilitasi->nip : '' }}</div>
                            </div>
                            <div class="org-ph">
                                <img src="{{ $fotoUrl($orgBidRehabilitasi) }}" alt="Kabid Rehabilitasi">
                            </div>
                        </div>

                    </div>

                    <div class="org-vl" style="height:14px;"></div>
                    <div class="on-pill">Kelompok Jabatan Fungsional</div>

                </div>
            </div>

        </div>
        </div>
    </div>
</div>
@endif

                {{-- ── KARTU WILAYAH ── --}}
                @php $no = 0; @endphp

@foreach($grouped as $wilayahId => $items)
    @if($pusatWilayahId !== null && (string)$wilayahId === (string)$pusatWilayahId)
        @continue
    @endif

  @php
    $no++;

    $wilayahNama = optional($items->first()->wilayah)->nama_wilayah ?? 'Tanpa Wilayah';
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
    ])->toArray();
@endphp

<div class="col-sm-6 col-xl-4 kontak-card fade-up default-limit"
     data-default="{{ $no <= 3 ? 'show' : 'hide' }}"
     data-wilayah-id="{{ $wilayahId !== 'tanpa-wilayah' ? $wilayahId : '' }}"
     data-wilayah-nama="{{ strtolower($wilayahNama) }}"
     data-persons="{{ htmlspecialchars(json_encode($allPersonIds), ENT_QUOTES) }}">
                    @if($pusatWilayahId !== null && (string)$wilayahId === (string)$pusatWilayahId)
                        @continue
                    @endif

                        <div class="wilayah-card">
                            <div class="card-body-inner">

                                <div class="region-header">
                                    <img class="region-logo" src="{{ $wilayahLogoUrl }}" alt="Logo {{ $wilayahNama }}">
                                    <div>
                                        <div class="region-name">{{ $wilayahNama }}</div>
                                        <div class="region-count">{{ $items->count() }} kontak terdaftar</div>
                                    </div>
                                </div>

                                <hr class="card-divider">

                                {{-- Kalaksa — TANPA nomor HP --}}
                                <div class="kalaksa-block">
                                    <img class="kalaksa-photo"
                                         src="{{ $kalaksa && $kalaksa->foto ? \Illuminate\Support\Facades\Storage::url($kalaksa->foto) : url('/assets/bpbd.png') }}"
                                         alt="{{ $kalaksa ? $kalaksa->nama : 'Kalaksa' }}"
                                         onerror="this.src='{{ url('/assets/bpbd.png') }}'">
                                    <div class="kalaksa-info">
                                        <div class="kalaksa-role">Kepala Pelaksana</div>
                                        @if($kalaksa)
                                            <div class="kalaksa-name" title="{{ $kalaksa->nama }}">{{ $kalaksa->nama }}</div>
                                        @else
                                            <div class="kalaksa-name" style="color:#475569;font-style:italic;font-weight:400;">Belum ada data</div>
                                        @endif
                                        {{-- Lock badge -- ganti nomor HP --}}
                                        <div class="kalaksa-lock">
                                            <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                                                <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                                            </svg>
                                            Login untuk lihat kontak
                                        </div>
                                    </div>
                                </div>

                                <div class="jabatan-chips">
                                    @php
                                        $chipList = [
                                            ['label' => 'Kabid KL',         'person' => $kabid,   '--c' => '59,130,246'],
                                            ['label' => 'Kasi Kedaruratan', 'person' => $kasiKed, '--c' => '249,115,22'],
                                            ['label' => 'Kasi Logistik',    'person' => $kasiLog, '--c' => '34,197,94'],
                                        ];
                                    @endphp
                                    @foreach($chipList as $chip)
                                        @if($chip['person'])
                                            <span class="chip chip-filled" style="--c:{{ $chip['--c'] }}">
                                                <span class="chip-dot"></span>{{ $chip['label'] }}
                                            </span>
                                        @else
                                            <span class="chip chip-empty">{{ $chip['label'] }}</span>
                                        @endif
                                    @endforeach
                                </div>

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
                                            <span style="color:#64748b;font-size:.7rem;">+{{ $operators->count() - 3 }} lainnya</span>
                                        </div>
                                    @endif
                                </div>

                            </div>{{-- /card-body-inner --}}

                            <div class="card-footer-inner">
                                <span class="footer-meta">{{ $operators->count() }} operator terdaftar</span>
                                {{-- Tombol detail — selalu buka modal login --}}
@auth
    {{-- ✅ Jika SUDAH login --}}
    <a href="{{ route('wilayah.detail', $wilayahId) }}" class="btn-detail">
        🔓 Lihat Semua Kontak
        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24"
             fill="none" stroke="currentColor" stroke-width="2.5"
             stroke-linecap="round" stroke-linejoin="round">
            <path d="M5 12h14M12 5l7 7-7 7"/>
        </svg>
    </a>
@else
    {{-- ❌ Jika BELUM login --}}
    <button class="btn-detail"
            onclick="requireLogin('{{ route('wilayah.detail', $wilayahId) }}')">
        🔒 Lihat Semua Kontak
        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24"
             fill="none" stroke="currentColor" stroke-width="2.5"
             stroke-linecap="round" stroke-linejoin="round">
            <path d="M5 12h14M12 5l7 7-7 7"/>
        </svg>
    </button>
@endauth
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

{{-- ── FOOTER ── --}}
<footer class="main-footer">
    <div class="footer-inner">
        <div>
            <div class="footer-brand">BPBD Sumatera Barat</div>
            <p class="footer-brand-sub">Platform digitalisasi untuk koordinasi dan manajemen kebencanaan yang lebih cepat dan efisien.</p>
        </div>
        <div class="footer-col">
            <h4>Layanan</h4>
            <a href="/kontak-wilayah">Direktori Kontak Wilayah</a>
            <a href="/sirine">Kontrol Sirine</a>
            <a href="/dashboard">Dashboard Admin</a>
        </div>
        <div class="footer-col">
            <h4>Platform</h4>
            <a href="/login">Login</a>
            <a href="/">Beranda</a>
            <a href="#">Kebijakan Privasi</a>
            <a href="#">Kontak Teknis</a>
        </div>
    </div>
    <div class="footer-bottom">
        <span>&copy; {{ date('Y') }} Digitalisasi BPBD Sumbar 1.0</span>
        <span><span class="status-dot"></span>Semua sistem berjalan normal</span>
    </div>
</footer>

<script>
// ── LOGIN MODAL ──
let pendingUrl = null;

function requireLogin(url) {
    pendingUrl = url;
    document.getElementById('loginModal').classList.add('show');
    document.body.style.overflow = 'hidden';
}
function closeModal() {
    document.getElementById('loginModal').classList.remove('show');
    document.body.style.overflow = '';
    pendingUrl = null;
}
function goToLogin() {
    // Simpan URL tujuan di session storage supaya setelah login bisa redirect
    if (pendingUrl) sessionStorage.setItem('redirect_after_login', pendingUrl);
    window.location.href = '/login';
}
// Tutup modal klik di luar
document.getElementById('loginModal').addEventListener('click', function(e) {
    if (e.target === this) closeModal();
});
// Tutup dengan Escape
document.addEventListener('keydown', e => { if (e.key === 'Escape') closeModal(); });

// ── HAMBURGER ──
const hamburger = document.getElementById('hamburger');
const navLinks  = document.getElementById('navLinks');
hamburger.addEventListener('click', () => {
    hamburger.classList.toggle('open');
    navLinks.classList.toggle('open');
});

// ── FILTER ──
(function () {
    const wilayahSel = document.getElementById('filter-wilayah');
    const jabatanSel = document.getElementById('filter-jabatan');
    const searchInp  = document.getElementById('filter-search');
    const cards      = Array.from(document.querySelectorAll('.kontak-card[data-wilayah-id]'));

    function applyFilter() {
    const wVal    = wilayahSel.value;
    const jVal    = jabatanSel.value;
    const keyword = searchInp.value.toLowerCase().trim();

    const isFiltering = wVal || jVal || keyword;

    // ambil card struktur organisasi
    const orgCard = document.querySelector('.org-card');

    // 🔴 SEMBUNYIKAN / TAMPILKAN STRUKTUR ORGANISASI
    if (orgCard) {
        orgCard.style.display = isFiltering ? 'none' : '';
    }

    cards.forEach(card => {

        // kalau TIDAK filter → pakai limit awal
        if (!isFiltering) {
            if (card.dataset.default === 'hide') {
                card.style.display = 'none';
            } else {
                card.style.display = '';
            }
            return;
        }

        // filter wilayah
        if (wVal && card.dataset.wilayahId !== wVal) {
            card.style.display = 'none';
            return;
        }

        const namaCocok = !keyword || (card.dataset.wilayahNama || '').includes(keyword);

        let persons = [];
        try { persons = JSON.parse(card.dataset.persons || '[]'); } catch(e) {}

        const jabatanCocok = !jVal || persons.some(p => String(p.jabatan_id) === jVal);

        card.style.display = (namaCocok && jabatanCocok) ? '' : 'none';
    });
}

    wilayahSel.addEventListener('change', applyFilter);
    jabatanSel.addEventListener('change', applyFilter);
    searchInp.addEventListener('input', applyFilter);
})();

// ── FADE UP ──
const fadeEls = document.querySelectorAll('.fade-up');
const observer = new IntersectionObserver((entries) => {
    entries.forEach(e => {
        if (e.isIntersecting) { e.target.classList.add('visible'); observer.unobserve(e.target); }
    });
}, { threshold: 0.08 });
fadeEls.forEach(el => observer.observe(el));

function applyDefaultLimit() {
    const cards = document.querySelectorAll('.default-limit');

    cards.forEach(card => {
        if (card.dataset.default === 'hide') {
            card.style.display = 'none';
        }
    });
}
// Jalankan saat pertama load
applyDefaultLimit();

</script>

</body>
</html>