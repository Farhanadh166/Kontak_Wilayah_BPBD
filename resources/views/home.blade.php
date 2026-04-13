<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digitalisasi BPBD Sumbar 1.0</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --bg:        #050c18;
            --surface:   #0a1628;
            --border:    rgba(96,165,250,0.15);
            --cyan:      #38bdf8;
            --orange:    #fb923c;
            --green:     #4ade80;
            --text:      #e2eaf7;
            --muted:     rgba(180,200,230,0.6);
            --card-bg:   rgba(10,22,46,0.85);
        }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'Inter', system-ui, sans-serif;
            background: var(--bg);
            color: var(--text);
            overflow-x: hidden;
            min-height: 100vh;
        }

        /* ── ANIMATED BACKGROUND ── */
        .bg-layer {
            position: fixed;
            inset: 0;
            z-index: 0;
            pointer-events: none;
            overflow: hidden;
        }
        .bg-layer::before {
            content: '';
            position: absolute;
            width: 900px; height: 900px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(56,189,248,0.12) 0%, transparent 70%);
            top: -300px; left: -200px;
            animation: driftA 18s ease-in-out infinite alternate;
        }
        .bg-layer::after {
            content: '';
            position: absolute;
            width: 700px; height: 700px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(251,146,60,0.10) 0%, transparent 70%);
            bottom: -200px; right: -150px;
            animation: driftB 22s ease-in-out infinite alternate;
        }
        .bg-orb3 {
            position: absolute;
            width: 500px; height: 500px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(74,222,128,0.07) 0%, transparent 70%);
            bottom: 30%; left: 40%;
            animation: driftC 28s ease-in-out infinite alternate;
        }
        @keyframes driftA { to { transform: translate(80px, 60px) scale(1.15); } }
        @keyframes driftB { to { transform: translate(-70px, -50px) scale(1.1); } }
        @keyframes driftC { to { transform: translate(50px, -80px) scale(1.2); } }

        /* Grid dots */
        .bg-grid {
            position: fixed;
            inset: 0;
            z-index: 0;
            pointer-events: none;
            background-image:
                radial-gradient(circle, rgba(96,165,250,0.18) 1px, transparent 1px);
            background-size: 40px 40px;
            mask-image: radial-gradient(ellipse 80% 80% at 50% 50%, black 30%, transparent 100%);
            opacity: 0.4;
        }

        /* ── NAVBAR ── */
        nav {
            position: sticky;
            top: 0;
            z-index: 100;
            background: rgba(5, 12, 24, 0.75);
            backdrop-filter: blur(20px) saturate(180%);
            border-bottom: 1px solid var(--border);
            padding: 0.85rem 0;
        }
        .nav-inner {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
        }
        .nav-brand {
            font-family: 'Inter', sans-serif;
            font-weight: 800;
            font-size: 1.15rem;
            color: #fff;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.6rem;
            letter-spacing: -0.02em;
        }
        .brand-dot {
            width: 9px; height: 9px;
            border-radius: 50%;
            background: var(--cyan);
            box-shadow: 0 0 8px var(--cyan);
            animation: pulse 2s ease-in-out infinite;
        }
        @keyframes pulse { 0%,100%{opacity:1;transform:scale(1)} 50%{opacity:.55;transform:scale(0.85)} }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 0.4rem;
            list-style: none;
        }
        .nav-links a {
            color: var(--muted);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            padding: 0.45rem 0.9rem;
            border-radius: 0.5rem;
            transition: color .2s, background .2s;
        }
        .nav-links a:hover { color: var(--text); background: rgba(96,165,250,0.1); }
        .nav-links .btn-login {
            background: rgba(56,189,248,0.12);
            border: 1px solid rgba(56,189,248,0.35);
            color: var(--cyan);
            font-weight: 600;
        }
        .nav-links .btn-login:hover { background: rgba(56,189,248,0.22); color: #fff; }

        /* Hamburger */
        .hamburger {
            display: none;
            flex-direction: column;
            gap: 5px;
            cursor: pointer;
            padding: 4px;
            background: none;
            border: none;
        }
        .hamburger span {
            width: 24px; height: 2px;
            background: var(--muted);
            border-radius: 2px;
            transition: .3s;
        }
        .hamburger.open span:nth-child(1) { transform: rotate(45deg) translate(5px,5px); }
        .hamburger.open span:nth-child(2) { opacity: 0; }
        .hamburger.open span:nth-child(3) { transform: rotate(-45deg) translate(5px,-5px); }

        /* ── HERO ── */
        .hero {
            position: relative;
            z-index: 1;
            max-width: 1200px;
            margin: 0 auto;
            padding: 6rem 2rem 4rem;
            display: grid;
            grid-template-columns: 1fr 1fr;
            align-items: center;
            gap: 4rem;
        }
        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(56,189,248,0.08);
            border: 1px solid rgba(56,189,248,0.3);
            color: var(--cyan);
            font-size: 0.8rem;
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            padding: 0.4rem 1rem;
            border-radius: 999px;
            margin-bottom: 1.5rem;
            width: fit-content;
        }
        .badge-ring {
            width: 7px; height: 7px;
            border-radius: 50%;
            background: var(--cyan);
            box-shadow: 0 0 6px var(--cyan);
            animation: pulse 1.8s ease-in-out infinite;
        }
        .hero-title {
            font-family: 'Inter', sans-serif;
            font-size: clamp(2.2rem, 4.5vw, 3.6rem);
            font-weight: 800;
            line-height: 1.08;
            letter-spacing: -0.04em;
            margin-bottom: 1.3rem;
            color: #f0f8ff;
        }
        .hero-title .accent-cyan { color: var(--cyan); }
        .hero-title .accent-orange { color: var(--orange); }
        .hero-sub {
            color: var(--muted);
            font-size: 1.05rem;
            line-height: 1.7;
            max-width: 48ch;
            margin-bottom: 2rem;
        }
        .hero-actions { display: flex; gap: 0.75rem; flex-wrap: wrap; }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-family: 'Inter', sans-serif;
            font-weight: 700;
            font-size: 0.92rem;
            padding: 0.7rem 1.4rem;
            border-radius: 0.6rem;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: transform .18s ease, box-shadow .18s ease, background .2s;
            letter-spacing: 0.02em;
        }
        .btn:hover { transform: translateY(-2px); }
        .btn-primary {
            background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
            color: #fff;
            box-shadow: 0 4px 20px rgba(34,197,94,0.35);
        }
        .btn-primary:hover { box-shadow: 0 8px 30px rgba(34,197,94,0.5); }
        .btn-ghost {
            background: rgba(255,255,255,0.06);
            border: 1px solid var(--border);
            color: var(--text);
        }
        .btn-ghost:hover { background: rgba(255,255,255,0.1); border-color: rgba(96,165,250,0.3); }

        /* Floating visual */
        .hero-visual {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .visual-ring {
            position: absolute;
            border-radius: 50%;
            border: 1px solid;
            animation: spin linear infinite;
        }
        .ring1 {
            width: 340px; height: 340px;
            border-color: rgba(56,189,248,0.18);
            animation-duration: 30s;
        }
        .ring2 {
            width: 260px; height: 260px;
            border-color: rgba(251,146,60,0.2);
            animation-duration: 22s;
            animation-direction: reverse;
        }
        @keyframes spin { to { transform: rotate(360deg); } }
        .ring-dot {
            position: absolute;
            width: 8px; height: 8px;
            border-radius: 50%;
            top: -4px; left: calc(50% - 4px);
        }
        .ring1 .ring-dot { background: var(--cyan); box-shadow: 0 0 10px var(--cyan); }
        .ring2 .ring-dot { background: var(--orange); box-shadow: 0 0 10px var(--orange); }

        .hero-logo-wrap {
            position: relative;
            z-index: 2;
            animation: floatY 5s ease-in-out infinite alternate;
        }
        @keyframes floatY { from { transform: translateY(0); } to { transform: translateY(-14px); } }
        .hero-logo-wrap img {
            width: 200px;
            height: auto;
            filter: drop-shadow(0 20px 48px rgba(56,189,248,0.35));
        }

        /* ── STATS ROW ── */
        .stats-row {
            position: relative;
            z-index: 1;
            max-width: 1200px;
            margin: 0 auto 0;
            padding: 0 2rem 4rem;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.25rem;
        }
        .stat-card {
            background: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: 1rem;
            padding: 1.4rem 1.6rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            backdrop-filter: blur(12px);
            transition: border-color .2s, transform .2s;
        }
        .stat-card:hover { border-color: rgba(56,189,248,0.35); transform: translateY(-2px); }
        .stat-icon {
            width: 48px; height: 48px;
            border-radius: 0.75rem;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.4rem;
            flex-shrink: 0;
        }
        .stat-value {
            font-family: 'Inter', sans-serif;
            font-size: 1.6rem;
            font-weight: 800;
            line-height: 1;
            color: #fff;
        }
        .stat-label {
            font-size: 0.8rem;
            color: var(--muted);
            margin-top: 0.2rem;
        }

        /* ── SECTION ── */
        .section {
            position: relative;
            z-index: 1;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem 5rem;
        }
        .section-header {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            margin-bottom: 2rem;
            gap: 1rem;
        }
        .section-eyebrow {
            font-family: 'Inter', sans-serif;
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: var(--cyan);
            margin-bottom: 0.4rem;
        }
        .section-heading {
            font-family: 'Inter', sans-serif;
            font-size: 1.7rem;
            font-weight: 800;
            color: #f0f8ff;
            letter-spacing: -0.03em;
        }

        /* Divider */
        .divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(56,189,248,0.3), transparent);
            margin: 0 2rem 4rem;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
        }

        /* ── HUB CARDS ── */
        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.25rem;
        }
        .hub-card {
            background: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: 1.25rem;
            padding: 1.75rem;
            backdrop-filter: blur(14px);
            transition: transform .22s ease, border-color .22s ease, box-shadow .22s ease;
            position: relative;
            overflow: hidden;
        }
        .hub-card::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 1.25rem;
            opacity: 0;
            transition: opacity .3s;
        }
        .hub-card:hover { transform: translateY(-5px); box-shadow: 0 24px 60px rgba(2,6,23,0.7); }
        .hub-card:hover::before { opacity: 1; }

        .card-cyan:hover  { border-color: rgba(56,189,248,0.5); }
        .card-cyan::before  { background: radial-gradient(circle at top left, rgba(56,189,248,0.08), transparent 60%); }
        .card-orange:hover { border-color: rgba(251,146,60,0.5); }
        .card-orange::before { background: radial-gradient(circle at top left, rgba(251,146,60,0.08), transparent 60%); }
        .card-green:hover  { border-color: rgba(74,222,128,0.5); }
        .card-green::before  { background: radial-gradient(circle at top left, rgba(74,222,128,0.08), transparent 60%); }
        .card-purple:hover { border-color: rgba(167,139,250,0.5); }
        .card-purple::before { background: radial-gradient(circle at top left, rgba(167,139,250,0.08), transparent 60%); }

        .card-icon {
            width: 52px; height: 52px;
            border-radius: 0.85rem;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1.1rem;
            border: 1px solid rgba(255,255,255,0.08);
        }
        .card-title {
            font-family: 'Inter', sans-serif;
            font-size: 1.1rem;
            font-weight: 700;
            color: #f0f8ff;
            margin-bottom: 0.5rem;
        }
        .card-desc {
            font-size: 0.88rem;
            color: var(--muted);
            line-height: 1.65;
            margin-bottom: 1.4rem;
        }
        .card-link {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            font-family: 'Inter', sans-serif;
            font-size: 0.82rem;
            font-weight: 700;
            text-decoration: none;
            letter-spacing: 0.04em;
            transition: gap .2s;
        }
        .card-link:hover { gap: 0.7rem; }
        .card-cyan  .card-link { color: var(--cyan); }
        .card-orange .card-link { color: var(--orange); }
        .card-green .card-link { color: var(--green); }
        .card-purple .card-link { color: #a78bfa; }

        /* ── CONTACT INFO ── */
        .contact-info { display: flex; flex-direction: column; gap: 0.5rem; }
        .contact-row {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            font-size: 0.85rem;
            color: var(--muted);
        }
        .contact-row span { color: var(--text); }

        /* ── CONTACT US ── */
        .contact-us-wrap {
            display: grid;
            grid-template-columns: 1fr 1.4fr;
            gap: 2rem;
            align-items: start;
        }
        .contact-info-panel { display: flex; flex-direction: column; gap: 1rem; }
        .cinfo-item {
            display: flex;
            align-items: flex-start;
            gap: 0.85rem;
        }
        .cinfo-icon {
            width: 42px; height: 42px;
            border-radius: 0.7rem;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.1rem;
            flex-shrink: 0;
        }
        .cinfo-label {
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 0.2rem;
        }
        .cinfo-value {
            font-size: 0.9rem;
            color: var(--text);
            font-weight: 500;
            line-height: 1.5;
        }

        /* Form */
        .contact-form-panel { display: flex; flex-direction: column; gap: 1rem; }
        .form-group { display: flex; flex-direction: column; gap: 0.4rem; }
        .form-label {
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--muted);
            letter-spacing: 0.04em;
        }
        .form-input {
            background: rgba(2,6,23,0.5);
            border: 1px solid var(--border);
            border-radius: 0.6rem;
            padding: 0.65rem 0.9rem;
            color: var(--text);
            font-family: 'Inter', sans-serif;
            font-size: 0.88rem;
            outline: none;
            transition: border-color .2s, box-shadow .2s;
            width: 100%;
        }
        .form-input::placeholder { color: rgba(180,200,230,0.3); }
        .form-input:focus {
            border-color: rgba(56,189,248,0.5);
            box-shadow: 0 0 0 3px rgba(56,189,248,0.08);
        }
        .form-textarea { resize: vertical; min-height: 110px; }
        .form-success {
            display: none;
            background: rgba(74,222,128,0.1);
            border: 1px solid rgba(74,222,128,0.3);
            border-radius: 0.6rem;
            padding: 0.75rem 1rem;
            font-size: 0.85rem;
            color: var(--green);
            text-align: center;
        }
        @media (max-width: 800px) {
            .contact-us-wrap { grid-template-columns: 1fr; }
        }

        /* ── ALERT BANNER ── */
        .alert-banner {
            position: relative;
            z-index: 1;
            max-width: 1200px;
            margin: 0 auto 4rem;
            padding: 0 2rem;
        }
        .alert-inner {
            background: rgba(251,146,60,0.08);
            border: 1px solid rgba(251,146,60,0.3);
            border-radius: 1rem;
            padding: 1.25rem 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            backdrop-filter: blur(12px);
        }
        .alert-icon {
            font-size: 1.4rem;
            flex-shrink: 0;
            animation: shake 4s ease-in-out infinite;
        }
        @keyframes shake {
            0%,90%,100%{transform:rotate(0)} 92%{transform:rotate(-8deg)} 94%{transform:rotate(8deg)} 96%{transform:rotate(-5deg)} 98%{transform:rotate(5deg)}
        }
        .alert-text { font-size: 0.88rem; color: rgba(251,200,140,0.9); line-height: 1.5; }
        .alert-text strong { color: #fb923c; }

        /* ── FOOTER ── */
        footer {
            position: relative;
            z-index: 1;
            border-top: 1px solid rgba(56,189,248,0.1);
            background: rgba(5,12,24,0.6);
            backdrop-filter: blur(10px);
        }
        .footer-inner {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2.5rem 2rem;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 2rem;
        }
        .footer-brand {
            font-family: 'Inter', sans-serif;
            font-weight: 800;
            font-size: 1rem;
            color: #fff;
            margin-bottom: 0.5rem;
        }
        .footer-brand-sub { font-size: 0.82rem; color: var(--muted); line-height: 1.6; }
        .footer-col h4 {
            font-family: 'Inter', sans-serif;
            font-size: 0.78rem;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 0.85rem;
        }
        .footer-col a {
            display: block;
            color: rgba(180,200,230,0.55);
            text-decoration: none;
            font-size: 0.86rem;
            margin-bottom: 0.5rem;
            transition: color .2s;
        }
        .footer-col a:hover { color: var(--cyan); }
        .footer-bottom {
            border-top: 1px solid rgba(56,189,248,0.08);
            padding: 1.1rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            gap: 1rem;
            flex-wrap: wrap;
            font-size: 0.8rem;
            color: rgba(180,200,230,0.4);
        }
        .status-dot {
            display: inline-block;
            width: 6px; height: 6px;
            border-radius: 50%;
            background: var(--green);
            box-shadow: 0 0 6px var(--green);
            margin-right: 5px;
            animation: pulse 2s ease-in-out infinite;
        }

        /* ── ENTRANCE ANIMATIONS ── */
        .fade-up {
            opacity: 0;
            transform: translateY(28px);
            transition: opacity .65s ease, transform .65s ease;
        }
        .fade-up.visible { opacity: 1; transform: translateY(0); }

        .stagger-1 { transition-delay: .05s; }
        .stagger-2 { transition-delay: .12s; }
        .stagger-3 { transition-delay: .19s; }
        .stagger-4 { transition-delay: .26s; }

        /* ── RESPONSIVE ── */
        @media (max-width: 900px) {
            .hero { grid-template-columns: 1fr; gap: 3rem; padding-top: 4rem; }
            .hero-visual { order: -1; }
            .ring1 { width: 260px; height: 260px; }
            .ring2 { width: 200px; height: 200px; }
            .hero-logo-wrap img { width: 150px; }
            .stats-row { grid-template-columns: 1fr; }
            .footer-inner { grid-template-columns: 1fr; gap: 1.5rem; }
            .footer-bottom { flex-direction: column; gap: 0.5rem; }
        }
        @media (max-width: 600px) {
            .nav-links { display: none; flex-direction: column; }
            .nav-links.open { display: flex; position: absolute; top: 100%; left: 0; right: 0; background: rgba(5,12,24,0.98); padding: 1rem 2rem; border-bottom: 1px solid var(--border); }
            .hamburger { display: flex; }
            .hero { padding: 3rem 1.25rem 2rem; }
            .stats-row, .section, .alert-banner { padding-left: 1.25rem; padding-right: 1.25rem; }
            .section-header { flex-direction: column; align-items: flex-start; }
            .hero-title { font-size: 2rem; }
        }
    </style>
</head>
<body>

<div class="bg-layer"><div class="bg-orb3"></div></div>
<div class="bg-grid"></div>

<!-- ── NAVBAR ── -->
<nav>
    <div class="nav-inner">
        <a class="nav-brand" href="#">
            <div class="brand-dot"></div>
            BPBD Sumbar
        </a>

        <button class="hamburger" id="hamburger" aria-label="Menu">
            <span></span><span></span><span></span>
        </button>

        <ul class="nav-links" id="navLinks">
            <li><a href="/kontak-wilayah">Direktori Kontak</a></li>
            <li><a href="/sirine">Kontrol Sirine</a></li>
            <li><a href="/login" class="btn-login">Login →</a></li>
        </ul>
    </div>
</nav>

<!-- ── HERO ── -->
<header class="hero">
    <div class="hero-content fade-up">
        <div class="hero-badge">
            <div class="badge-ring"></div>
            Digitalisasi BPBD Sumbar 1.0
        </div>
        <h1 class="hero-title">
            Pusat Navigasi<br>
            <span class="accent-cyan">Proyek Digital</span><br>
            <span class="accent-orange">BPBD</span> Sumbar
        </h1>
        <p class="hero-sub">
            Platform terpadu untuk mendigitalkan dan mengelola
            proyek-proyek kebencanaan di Sumatera Barat.
            Cepat, andal, dan mudah diakses kapan saja.
        </p>
    </div>

    <div class="hero-visual fade-up stagger-2">
        <div class="visual-ring ring1"><div class="ring-dot"></div></div>
        <div class="visual-ring ring2"><div class="ring-dot"></div></div>
        <div class="hero-logo-wrap">
            <img src="{{ url('/assets/bpbd.png') }}" alt="Logo BPBD Sumatera Barat">
        </div>
    </div>
</header>

<!-- ── STATS ── -->

<!-- ── DIVIDER ── -->
<div class="divider"></div>

<!-- ── CONTACT US SECTION ── -->
<section class="section" id="layanan">
    <div class="section-header">
        <div>
            <div class="section-eyebrow">Hubungi Kami</div>
            <h2 class="section-heading">Contact Us</h2>
        </div>
    </div>

    <div class="contact-us-wrap fade-up">
        <!-- Left: Info -->
        <div class="contact-info-panel">
            <p style="color:var(--muted); font-size:0.93rem; line-height:1.75; margin-bottom:1.8rem;">
                Punya pertanyaan, laporan, atau butuh bantuan terkait kebencanaan di Sumatera Barat?
                Tim kami siap membantu Anda.
            </p>

            <div class="cinfo-item">
                <div>
                    <div class="cinfo-label">Alamat Kantor</div>
                    <div class="cinfo-value">Jl. Jend. Sudirman No.47, Padang Pasir, Kec. Padang Bar., Kota Padang,<br>Sumatera Barat 25129</div>
                </div>
            </div>

            <div class="cinfo-item">
                <div>
                    <div class="cinfo-label">Telepon Kantor</div>
                    <div class="cinfo-value">(0751) 890720</div>
                </div>
            </div>

            <div class="cinfo-item">
                <div>
                    <div class="cinfo-label">Email</div>
                    <div class="cinfo-value">info@bpbd.sumbarprov.go.id</div>
                </div>
            </div>
        </div>

        <!-- Right: Form -->
        <div class="contact-form-panel hub-card card-cyan" style="padding:2rem;">
            <div class="form-group">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" class="form-input" placeholder="Masukkan nama Anda">
            </div>
            <div class="form-group">
                <label class="form-label">Email</label>
                <input type="email" class="form-input" placeholder="email@contoh.com">
            </div>
            <div class="form-group">
                <label class="form-label">No. Telepon</label>
                <input type="tel" class="form-input" placeholder="+62 8xx-xxxx-xxxx">
            </div>
            <div class="form-group">
                <label class="form-label">Pesan</label>
                <textarea class="form-input form-textarea" placeholder="Tuliskan pesan atau laporan Anda di sini..."></textarea>
            </div>
            <button class="btn btn-primary" style="width:100%; justify-content:center; padding:.8rem;" onclick="handleSend(this)">
                Kirim Pesan
            </button>
            <div class="form-success" id="formSuccess">✅ Pesan berhasil terkirim! Tim kami akan segera menghubungi Anda.</div>
        </div>
    </div>
</section>

<!-- ── FOOTER ── -->
<footer>
    <div class="footer-inner">
        <div>
            <div class="footer-brand">BPBD Sumatera Barat</div>
            <p class="footer-brand-sub">Platform digitalisasi untuk koordinasi dan manajemen kebencanaan yang lebih cepat dan efisien.</p>
        </div>
        <div class="footer-col">
            <h4>Layanan</h4>
            <a href="/kontak-wilayah">Direktori Kontak Wilayah</a>
            <a href="/sirine">Kontrol Sirine</a>
            <a href="#">Peta Risiko</a>
            <a href="#">Laporan Bencana</a>
        </div>
        <div class="footer-col">
            <h4>Platform</h4>
            <a href="/login">Login</a>
            <a href="#">Dokumentasi</a>
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
    // Hamburger
    const hamburger = document.getElementById('hamburger');
    const navLinks  = document.getElementById('navLinks');
    hamburger.addEventListener('click', () => {
        hamburger.classList.toggle('open');
        navLinks.classList.toggle('open');
    });

    // Form send
    function handleSend(btn) {
        btn.textContent = '⏳ Mengirim...';
        btn.disabled = true;
        setTimeout(() => {
            btn.style.display = 'none';
            document.getElementById('formSuccess').style.display = 'block';
        }, 1400);
    }

    // Intersection Observer for fade-up
    const fadeEls = document.querySelectorAll('.fade-up');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(e => {
            if (e.isIntersecting) {
                e.target.classList.add('visible');
                observer.unobserve(e.target);
            }
        });
    }, { threshold: 0.12 });
    fadeEls.forEach(el => observer.observe(el));

    // Stat counter animation
    function animateCount(el, target, suffix = '') {
        let current = 0;
        const step = Math.ceil(target / 40);
        const timer = setInterval(() => {
            current = Math.min(current + step, target);
            el.textContent = current + suffix;
            if (current >= target) clearInterval(timer);
        }, 35);
    }
    const statObserver = new IntersectionObserver((entries) => {
        entries.forEach(e => {
            if (e.isIntersecting) {
                const vals = e.target.querySelectorAll('.stat-value');
                if (vals[0] && vals[0].textContent === '19') animateCount(vals[0], 19);
                statObserver.unobserve(e.target);
            }
        });
    }, { threshold: 0.5 });
    document.querySelectorAll('.stats-row').forEach(el => statObserver.observe(el));
</script>
</body>
</html>