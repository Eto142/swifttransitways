<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Swifttransitway Company Limited – Shipment Tracking">
    <title>Track Your Shipment | Swifttransitway Company Limited</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('wp-content/uploads/2022/04/Screenshot_20231009_092214-150x150.png') }}" sizes="32x32">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Rajdhani:wght@500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Leaflet.js -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" crossorigin="">
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" crossorigin=""></script>

    <style>
        /* ======================================================
           Swifttransitway — TRACKING PAGE DESIGN SYSTEM
        ====================================================== */
        :root {
            --primary:        #B01E16;
            --primary-mid:    #8C1510;
            --primary-light:  #D63A30;
            --navy:           #2D2D2D;
            --navy-mid:       #444444;
            --accent:         #FF7900;
            --accent-hover:   #CC6100;
            --accent-light:   #FFB347;
            --white:          #FFFFFF;
            --off-white:      #FDF5F4;
            --light-gray:     #F0EEED;
            --border:         #E2D8D7;
            --text:           #1E293B;
            --text-muted:     #64748B;
            --text-light:     #94A3B8;
            --success:        #16A34A;
            --shadow-sm:      0 1px 4px rgba(0,0,0,.07);
            --shadow-md:      0 4px 18px rgba(0,0,0,.10);
            --shadow-lg:      0 12px 40px rgba(0,0,0,.13);
            --radius-sm:      6px;
            --radius-md:      10px;
            --radius-lg:      16px;
            --transition:     all .3s ease;
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; font-size: 16px; }
        body {
            font-family: 'Inter', sans-serif;
            background: var(--off-white);
            color: var(--text);
            line-height: 1.7;
            overflow-x: hidden;
        }
        a { text-decoration: none; color: inherit; transition: var(--transition); }
        img { max-width: 100%; display: block; height: auto; }
        ul { list-style: none; padding: 0; margin: 0; }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* ======================================================
           TOP LOGO BAR
        ====================================================== */
        .track-topbar {
            background: #FFFFFF;
            padding: 14px 0;
            border-bottom: 3px solid var(--primary);
            box-shadow: 0 2px 10px rgba(0,0,0,.07);
        }
        .track-topbar-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .track-topbar-inner .topbar-right {
            font-size: .8rem;
            color: var(--text-muted);
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .track-topbar-inner .topbar-right i { color: var(--accent); }
        .track-logo {
            display: flex;
            align-items: center;
            gap: 16px;
        }
        .track-logo img {
            height: 60px;
            width: auto;
        }
        .track-logo-text .logo-name {
            display: block;
            font-family: 'Rajdhani', sans-serif;
            font-size: 22px;
            font-weight: 700;
            color: var(--navy);
            text-transform: uppercase;
            letter-spacing: .5px;
            line-height: 1.1;
        }
        .track-logo-text .logo-tagline {
            font-size: 11px;
            color: var(--accent);
            letter-spacing: 2px;
            text-transform: uppercase;
            font-weight: 600;
        }

        /* ======================================================
           TRACKING HERO BANNER
        ====================================================== */
        .tracking-hero {
            background: linear-gradient(160deg, var(--navy) 0%, var(--navy-mid) 55%, var(--primary) 100%);
            padding: 64px 0 88px;
            text-align: center;
            position: relative;
            overflow: hidden;
            clip-path: polygon(0 0, 100% 0, 100% 92%, 50% 100%, 0 92%);
            margin-bottom: 56px;
        }
        .tracking-hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background: url("data:image/svg+xml,%3Csvg width='80' height='80' viewBox='0 0 80 80' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23ffffff' fill-opacity='0.025'%3E%3Cpath d='M0 0h40v40H0zm40 40h40v40H40z'/%3E%3C/g%3E%3C/svg%3E");
        }
        .tracking-hero::after {
            content: '';
            position: absolute;
            bottom: 0; left: 0; right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--accent), var(--primary-light), var(--accent));
        }
        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255,121,0,.15);
            color: var(--accent-light);
            border: 1px solid rgba(255,121,0,.35);
            padding: 7px 20px;
            border-radius: 50px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 18px;
        }
        .tracking-hero h1 {
            font-family: 'Rajdhani', sans-serif;
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 700;
            color: var(--white);
            margin-bottom: 10px;
        }
        .tracking-hero .tracking-id {
            font-size: 1.1rem;
            color: rgba(255,255,255,.8);
            margin-bottom: 32px;
        }
        .tracking-id strong {
            color: var(--accent-light);
            font-family: 'Rajdhani', sans-serif;
            font-size: 1.3rem;
            letter-spacing: 1px;
        }
        .badge-group {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 12px;
            position: relative;
            z-index: 1;
        }
        .badge-item {
            background: rgba(255,255,255,.07);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255,255,255,.15);
            padding: 14px 22px;
            border-radius: 8px;
            color: white;
            min-width: 160px;
            text-align: center;
            border-top: 3px solid var(--accent);
        }
        .badge-item small {
            display: block;
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: rgba(255,255,255,.55);
            margin-bottom: 5px;
            font-weight: 600;
        }
        .badge-item strong {
            font-size: 1.05rem;
            font-weight: 700;
        }

        /* ======================================================
           INFO CARDS
        ====================================================== */
        .info-card {
            background: var(--white);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-md);
            margin-bottom: 24px;
            overflow: hidden;
            border: 1px solid var(--border);
            transition: var(--transition);
        }
        .info-card:hover {
            box-shadow: var(--shadow-lg);
            border-color: #d0c0be;
        }
        .info-header {
            background: var(--white);
            border-bottom: 1px solid var(--border);
            border-left: 5px solid var(--primary);
            padding: 14px 20px;
            font-family: 'Rajdhani', sans-serif;
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--navy);
            display: flex;
            align-items: center;
            gap: 10px;
            letter-spacing: .2px;
        }
        .info-header i {
            width: 30px;
            height: 30px;
            background: var(--primary);
            color: #fff;
            border-radius: 6px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: .8rem;
            flex-shrink: 0;
        }
        .info-body { padding: 22px; }

        .sub-heading {
            font-family: 'Rajdhani', sans-serif;
            font-size: 1rem;
            font-weight: 700;
            color: var(--navy);
            margin-bottom: 14px;
            display: flex;
            align-items: center;
            gap: 8px;
            padding-bottom: 6px;
            border-bottom: 1px solid var(--border);
        }
        .sub-heading i { color: var(--primary); }

        .info-row {
            display: flex;
            margin-bottom: 10px;
            padding-bottom: 8px;
            border-bottom: 1px solid var(--light-gray);
            font-size: 0.9rem;
        }
        .info-row:last-child { border-bottom: none; margin-bottom: 0; }
        .info-label {
            flex: 0 0 140px;
            font-weight: 600;
            color: var(--text-muted);
            font-size: .82rem;
            text-transform: uppercase;
            letter-spacing: .4px;
        }
        .info-value {
            flex: 1;
            color: var(--text);
            font-weight: 500;
        }

        /* ======================================================
           TABLE
        ====================================================== */
        .table-responsive { overflow-x: auto; }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.875rem;
        }
        table thead {
            background: var(--navy);
            color: var(--white);
        }
        table th, table td {
            padding: 12px 14px;
            border: 1px solid var(--border);
            text-align: left;
        }
        table th { font-weight: 700; letter-spacing: .3px; }
        table tbody tr:nth-child(even) { background: var(--off-white); }
        table tbody tr:hover { background: #fef0ee; }

        /* ======================================================
           PACKAGE IMAGE
        ====================================================== */
        .package-image-wrap {
            text-align: center;
            margin-bottom: 28px;
        }
        .package-image {
            max-width: 100%;
            max-height: 400px;
            width: auto;
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-lg);
            border: 3px solid var(--white);
            outline: 1px solid var(--border);
        }

        /* ======================================================
           TIMELINE
        ====================================================== */
        .timeline {
            position: relative;
            padding-left: 36px;
        }
        .timeline::before {
            content: '';
            position: absolute;
            left: 14px;
            top: 10px;
            bottom: 10px;
            width: 2px;
            background: linear-gradient(to bottom, var(--primary), var(--accent));
            border-radius: 2px;
        }
        .timeline-item {
            position: relative;
            margin-bottom: 24px;
            display: flex;
            gap: 16px;
        }
        .timeline-dot {
            position: absolute;
            left: -44px;
            width: 34px;
            height: 34px;
            border-radius: 8px;
            background: var(--primary);
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: .82rem;
            z-index: 2;
            box-shadow: 0 3px 10px rgba(176,30,22,.3);
            flex-shrink: 0;
        }
        .timeline-item:first-child .timeline-dot {
            background: var(--navy);
            box-shadow: 0 3px 10px rgba(45,45,45,.3);
        }
        .timeline-content {
            flex: 1;
            background: var(--white);
            padding: 16px 20px;
            border-radius: var(--radius-md);
            border: 1px solid var(--border);
            border-left: 4px solid var(--primary);
            box-shadow: var(--shadow-sm);
        }
        .timeline-date {
            font-size: .78rem;
            color: var(--text-muted);
            margin-bottom: 4px;
            font-weight: 500;
        }
        .timeline-status {
            font-family: 'Rajdhani', sans-serif;
            font-size: 1.05rem;
            font-weight: 700;
            color: var(--navy);
        }
        .timeline-location {
            font-size: .875rem;
            color: var(--primary);
            font-weight: 600;
            margin-top: 3px;
        }
        .timeline-remarks {
            margin-top: 10px;
            background: #fff8f5;
            border: 1px solid #fad9cc;
            padding: 8px 14px;
            border-radius: var(--radius-sm);
            font-size: .875rem;
            color: var(--text-muted);
        }

        /* ======================================================
           SIDEBAR COMPONENTS
        ====================================================== */
        .route-wrap {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 16px;
        }
        .route-pin {
            width: 42px;
            height: 42px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: .95rem;
            flex-shrink: 0;
        }
        .route-pin.origin { background: var(--primary); color: var(--white); }
        .route-pin.dest   { background: var(--navy); color: var(--white); }
        .route-label { font-size: .72rem; color: var(--text-muted); text-transform: uppercase; letter-spacing: .8px; font-weight: 600; }
        .route-name { font-weight: 700; color: var(--navy); font-size: .95rem; }

        .progress-track {
            height: 6px;
            background: var(--light-gray);
            border-radius: 10px;
            overflow: hidden;
            margin: 8px 0 16px;
        }
        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--primary), var(--accent));
            border-radius: 10px;
            transition: width .6s ease;
        }

        .action-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            width: 100%;
            padding: 13px 24px;
            border-radius: 8px;
            font-size: .9rem;
            font-weight: 700;
            cursor: pointer;
            border: none;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-mid) 100%);
            color: var(--white);
            box-shadow: 0 4px 16px rgba(176,30,22,.3);
            transition: var(--transition);
            text-align: center;
        }
        .action-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(176,30,22,.4);
            color: var(--white);
        }
        .action-btn-outline {
            background: transparent;
            color: var(--navy);
            border: 2px solid var(--navy);
            box-shadow: none;
            margin-top: 10px;
        }
        .action-btn-outline:hover {
            background: var(--navy);
            color: var(--white);
            box-shadow: none;
        }

        /* ======================================================
           FOOTER
        ====================================================== */
        .track-footer {
            background: var(--navy);
            color: rgba(255,255,255,.7);
            padding: 50px 0 24px;
            margin-top: 70px;
            border-top: 4px solid var(--primary);
        }
        .footer-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 40px;
            margin-bottom: 40px;
        }
        .footer-col-title {
            font-family: 'Rajdhani', sans-serif;
            font-size: 1rem;
            font-weight: 700;
            color: var(--white);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 16px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--accent);
            display: inline-block;
        }
        .footer-links li { margin-bottom: 8px; }
        .footer-links a {
            color: rgba(255,255,255,.6);
            font-size: .875rem;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: var(--transition);
        }
        .footer-links a:hover { color: var(--accent); transform: translateX(4px); }
        .footer-links i { font-size: .75rem; color: var(--accent); }
        .footer-bottom {
            text-align: center;
            border-top: 1px solid rgba(255,255,255,.08);
            padding-top: 24px;
            font-size: .875rem;
            color: rgba(255,255,255,.45);
        }

        /* ======================================================
           LAYOUT GRID
        ====================================================== */
        .content-grid {
            display: grid;
            grid-template-columns: 1fr 350px;
            gap: 28px;
            align-items: start;
        }

        /* ======================================================
           PRINT
        ====================================================== */
        @media print {
            .no-print { display: none !important; }
            body { background: white; }
            .info-card { box-shadow: none; border: 1px solid #ddd; }
            .track-topbar { background: var(--primary) !important; -webkit-print-color-adjust: exact; }
            .tracking-hero { clip-path: none; margin-bottom: 20px; }
        }

        /* Map animations */
        @keyframes pulseDot {
            0%, 100% { opacity: 1; transform: scale(1); }
            50%       { opacity: .4; transform: scale(.7); }
        }
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        @keyframes spinSync {
            to { transform: rotate(360deg); }
        }
        .syncing { animation: spinSync .6s linear infinite; }

        /* ======================================================
           RESPONSIVE HELPER CLASSES
        ====================================================== */
        .tracking-strip {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            gap: 10px;
            background: rgba(255,255,255,.08);
            border: 1px solid rgba(255,255,255,.18);
            border-radius: 50px;
            padding: 10px 24px;
            margin: 14px 0 28px;
        }
        .package-banner {
            display: flex;
            align-items: center;
            gap: 16px;
            background: linear-gradient(135deg,var(--primary) 0%,var(--primary-mid) 100%);
            border-radius: var(--radius-md);
            padding: 16px 20px;
            margin-bottom: 24px;
        }
        .package-banner-right {
            margin-left: auto;
            text-align: right;
            flex-shrink: 0;
        }
        .detail-grid-2col {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
            margin-bottom: 24px;
        }

        /* ======================================================
           RESPONSIVE
        ====================================================== */
        @media (max-width: 1024px) {
            .content-grid { grid-template-columns: 1fr 300px; }
        }
        @media (max-width: 960px) {
            .content-grid { grid-template-columns: 1fr; }
        }
        @media (max-width: 767px) {
            .tracking-hero { padding: 40px 0 65px; margin-bottom: 40px; }
            .tracking-hero h1 { font-size: 1.75rem; }
            .badge-group { gap: 10px; }
            .badge-item { min-width: 140px; }
            .info-row { flex-direction: column; gap: 2px; }
            .info-label { flex: none; }
            .timeline { padding-left: 28px; }
            .timeline::before { left: 12px; }
            .timeline-dot { width: 30px; height: 30px; left: -36px; font-size: .8rem; }
            .footer-grid { grid-template-columns: 1fr; gap: 28px; }
            .track-logo img { height: 46px; }
            .info-body { padding: 16px; }
            .info-header { padding: 14px 16px; font-size: 1rem; }
            .detail-grid-2col { grid-template-columns: 1fr !important; }
            .package-banner { flex-direction: column; align-items: flex-start; gap: 12px; padding: 14px 16px; }
            .package-banner-right { margin-left: 0; text-align: left; }
            .tracking-strip { border-radius: 14px; padding: 12px 16px; width: 100%; }
            #shipment-map { height: 280px !important; }
            table th, table td { padding: 10px 10px; font-size: .82rem; }
            .action-btn { padding: 11px 18px; font-size: .875rem; }
            .track-footer { padding: 36px 0 20px; margin-top: 40px; }
        }
        @media (max-width: 576px) {
            .tracking-hero { padding: 32px 0 55px; }
            .tracking-hero h1 { font-size: 1.5rem; }
            .badge-item { min-width: calc(50% - 8px); }
            .hero-badge { font-size: 11px; padding: 7px 18px; }
            .info-card { margin-bottom: 18px; }
            .timeline-content { padding: 12px 14px; }
            .timeline-date { font-size: .75rem; }
        }
        @media (max-width: 480px) {
            .container { padding: 0 12px; }
            .badge-item { min-width: 100%; }
            .tracking-strip { border-radius: 12px; }
            .info-body { padding: 12px; }
            .info-header { padding: 12px 14px; }
            .package-banner { padding: 12px 14px; }
            .timeline { padding-left: 24px; }
            .timeline-dot { width: 26px; height: 26px; left: -32px; font-size: .75rem; }
            table th, table td { padding: 8px 8px; font-size: .78rem; }
            .footer-links a { font-size: .82rem; }
        }
        @media (max-width: 360px) {
            .tracking-hero h1 { font-size: 1.3rem; }
            .badge-item { min-width: 100%; padding: 10px 12px; }
            .track-logo img { height: 38px; }
        }
    </style>
</head>
<!-- Smartsupp Live Chat script -->
<script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = 'd693c56d0826e792dd82921dbeeb82be13a5c89c';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script>
<noscript>Powered by <a href="https://www.smartsupp.com" target="_blank">Smartsupp</a></noscript>

<body>

<!-- ===========================
     LOGO TOP BAR
=========================== -->
<div class="track-topbar no-print">
    <div class="container">
        <div class="track-topbar-inner">
            <a href="{{ url('/') }}" class="track-logo" aria-label="Swifttransitway Home">
                <img src="{{ asset('wp-content/uploads/2022/04/Screenshot_20231009_092214.png') }}"
                     alt="Swifttransitway Company Limited">
            </a>
        </div>
    </div>
</div>

<!-- ===========================
     HERO BANNER
=========================== -->
<section class="tracking-hero">
    <div class="container">
        <span class="hero-badge">
            <i class="fas fa-satellite-dish"></i> Live Tracking
        </span>

        {{-- Package name / product --}}
        @if(!empty($shipment->product))
        <p style="font-size:.8rem; font-weight:700; text-transform:uppercase; letter-spacing:2.5px; color:var(--accent-light); margin-bottom:6px;">Package</p>
        <h1 style="font-size:clamp(1.6rem,4vw,2.8rem);">{{ $shipment->product }}</h1>
        @else
        <h1>Shipment Tracking Details</h1>
        @endif

        {{-- Tracking number strip --}}
        <div class="tracking-strip">
            <i class="fas fa-barcode" style="color:var(--accent-light); font-size:1.15rem;"></i>
            <span style="font-size:.75rem; text-transform:uppercase; letter-spacing:1.5px; color:rgba(255,255,255,.6); font-weight:600;">Tracking ID</span>
            <strong style="font-family:'Rajdhani',sans-serif; font-size:1.25rem; letter-spacing:1px; color:var(--white);">{{ $shipment->tracking_number }}</strong>
            <button onclick="navigator.clipboard.writeText('{{ $shipment->tracking_number }}')" title="Copy tracking number"
                    style="background:none;border:none;cursor:pointer;color:var(--accent-light);font-size:.85rem;padding:0 2px;">
                <i class="fas fa-copy"></i>
            </button>
        </div>

        <div class="badge-group">
            <div class="badge-item">
                <small>Current Status</small>
                <strong>{{ $shipment->status }}</strong>
            </div>
            <div class="badge-item">
                <small>Origin</small>
                <strong>{{ $shipment->origin }}</strong>
            </div>
            <div class="badge-item">
                <small>Destination</small>
                <strong>{{ $shipment->destination }}</strong>
            </div>
            <div class="badge-item">
                <small>Expected Delivery</small>
                <strong>{{ $shipment->expected_delivery_date }}</strong>
            </div>
        </div>
    </div>
</section>

<!-- ===========================
     MAIN CONTENT
=========================== -->
<div class="container" style="padding-bottom: 20px;">
    <div class="content-grid">

        <!-- ===== LEFT / MAIN COLUMN ===== -->
        <div>

            {{-- PACKAGE DETAILS --}}
            <div class="info-card">
                <div class="info-header">
                    <i class="fas fa-box-open"></i> Package Details
                </div>
                <div class="info-body">

                    {{-- Package name banner --}}
                    @if(!empty($shipment->product))
                    <div class="package-banner">
                        <div style="width:44px;height:44px;border-radius:50%;background:rgba(255,121,0,.2);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <i class="fas fa-cube" style="color:var(--accent);font-size:1.1rem;"></i>
                        </div>
                        <div>
                            <div style="font-size:.7rem;text-transform:uppercase;letter-spacing:2px;color:rgba(255,255,255,.55);font-weight:600;margin-bottom:3px;">Package Name</div>
                            <div style="font-family:'Rajdhani',sans-serif;font-size:1.35rem;font-weight:700;color:var(--white);line-height:1.2;">{{ $shipment->product }}</div>
                            @if(!empty($shipment->description))
                            <div style="font-size:.8rem;color:rgba(255,255,255,.6);margin-top:3px;">{{ $shipment->description }}</div>
                            @endif
                        </div>
                        <div class="package-banner-right">
                            <div style="font-size:.7rem;text-transform:uppercase;letter-spacing:1.5px;color:rgba(255,255,255,.5);margin-bottom:3px;">Tracking No.</div>
                            <div style="font-family:'Rajdhani',sans-serif;font-size:1rem;font-weight:700;color:var(--accent-light);">{{ $shipment->tracking_number }}</div>
                        </div>
                    </div>
                    @endif

                    <div class="detail-grid-2col">
                        <div>
                            <div class="sub-heading"><i class="fas fa-user-tie"></i> Sender Information</div>
                            <div class="info-row"><span class="info-label">Name</span><span class="info-value">{{ $shipment->shipper_name }}</span></div>
                            <div class="info-row"><span class="info-label">Address</span><span class="info-value">{{ $shipment->shipper_address }}</span></div>
                            <div class="info-row"><span class="info-label">Origin</span><span class="info-value">{{ $shipment->origin }}</span></div>
                        </div>
                        <div>
                            <div class="sub-heading"><i class="fas fa-user"></i> Receiver Information</div>
                            <div class="info-row"><span class="info-label">Name</span><span class="info-value">{{ $shipment->receiver_name }}</span></div>
                            <div class="info-row"><span class="info-label">Address</span><span class="info-value">{{ $shipment->receiver_address }}</span></div>
                            <div class="info-row"><span class="info-label">Destination</span><span class="info-value">{{ $shipment->destination }}</span></div>
                        </div>
                    </div>

                    <div class="detail-grid-2col">
                        <div>
                            <div class="sub-heading"><i class="fas fa-info-circle"></i> Shipment Details</div>
                            <div class="info-row"><span class="info-label">Carrier</span><span class="info-value">{{ $shipment->carrier }}</span></div>
                            <div class="info-row"><span class="info-label">Reference No</span><span class="info-value">{{ $shipment->reference_no }}</span></div>
                            <div class="info-row"><span class="info-label">Shipment Mode</span><span class="info-value">{{ $shipment->shipment_mode }}</span></div>
                        </div>
                        <div>
                            <div class="sub-heading"><i class="fas fa-clock"></i> Timing</div>
                            <div class="info-row"><span class="info-label">Departure</span><span class="info-value">{{ $shipment->departure_time }}</span></div>
                            <div class="info-row"><span class="info-label">Exp. Delivery</span><span class="info-value">{{ $shipment->expected_delivery_date }}</span></div>
                            <div class="info-row"><span class="info-label">Pickup Date</span><span class="info-value">{{ $shipment->pickup_date }}</span></div>
                            <div class="info-row"><span class="info-label">Pickup Time</span><span class="info-value">{{ $shipment->pickup_time }}</span></div>
                        </div>
                    </div>

                    <div class="sub-heading"><i class="fas fa-boxes"></i> Package Specifications</div>
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>Qty</th>
                                    <th>Weight (kg)</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $shipment->quantity }}</td>
                                    <td>{{ $shipment->weight }}</td>
                                    <td>{{ $shipment->description }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    @if($shipment->comments)
                    <div style="margin-top:20px;">
                        <div class="sub-heading"><i class="fas fa-comment-alt"></i> Additional Comments</div>
                        <p style="font-size:.9rem; color:var(--text-muted); background:var(--off-white); padding:14px 16px; border-radius:var(--radius-sm); border-left:4px solid var(--accent);">
                            {{ $shipment->comments }}
                        </p>
                    </div>
                    @endif
                </div>
            </div>

            {{-- LIVE MAP --}}
            <div class="info-card" id="live-map-card">
                <div class="info-header" style="justify-content:space-between;">
                    <span><i class="fas fa-map-marked-alt"></i> Live Shipment Map</span>
                    <span id="map-status-badge" style="font-size:.75rem; font-weight:600; background:rgba(255,121,0,.15); color:var(--accent-light); padding:4px 12px; border-radius:50px; display:flex; align-items:center; gap:6px;">
                        <span id="map-live-dot" style="width:8px;height:8px;border-radius:50%;background:var(--accent-light);display:inline-block;animation:pulseDot 1.4s infinite;"></span>
                        LIVE
                    </span>
                </div>
                <div style="position:relative;">
                    <div id="shipment-map" style="height:420px; width:100%; border-radius:0 0 var(--radius-lg) var(--radius-lg);"></div>
                    <div id="map-loading" style="position:absolute;inset:0;background:rgba(13,27,42,.7);display:flex;flex-direction:column;align-items:center;justify-content:center;gap:12px;border-radius:0 0 var(--radius-lg) var(--radius-lg);z-index:1000;">
                        <div style="width:40px;height:40px;border:3px solid rgba(255,255,255,.2);border-top-color:var(--accent);border-radius:50%;animation:spin .8s linear infinite;"></div>
                        <span style="color:white;font-size:.875rem;">Plotting route on map…</span>
                    </div>
                </div>
                <div style="padding:12px 20px; background:var(--off-white); border-top:1px solid var(--border); border-radius:0 0 var(--radius-lg) var(--radius-lg); display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:8px;">
                    <span style="font-size:.8rem; color:var(--text-muted);"><i class="fas fa-sync-alt" id="sync-icon"></i> Auto-refreshes every 30 s &nbsp;|&nbsp; Geocoding via OpenStreetMap</span>
                    <span id="map-last-updated" style="font-size:.8rem; color:var(--text-muted);"></span>
                </div>
            </div>

            {{-- PACKAGE IMAGE --}}
            @if(!empty($shipment->image))
            <div class="info-card">
                <div class="info-header">
                    <i class="fas fa-image"></i> Package Image
                </div>
                <div class="info-body" style="text-align:center; padding: 28px 24px;">
                    <img src="{{ asset($shipment->image) }}"
                         alt="Package Image"
                         class="package-image"
                         onerror="this.closest('.info-card').style.display='none'">
                    <p style="margin-top:12px; font-size:.8rem; color:var(--text-muted);">
                        <i class="fas fa-box"></i> Shipment #{{ $shipment->tracking_number }}
                    </p>
                </div>
            </div>
            @endif

            {{-- SHIPMENT HISTORY --}}
            <div class="info-card">
                <div class="info-header">
                    <i class="fas fa-history"></i> Shipment History
                </div>
                <div class="info-body">
                    <div class="timeline">
                        @forelse($history as $item)
                        <div class="timeline-item">
                            <div class="timeline-dot">
                                @php
                                    $s = strtolower($item->status ?? '');
                                    $icon = str_contains($s,'deliver') ? 'check-circle'
                                          : (str_contains($s,'transit') ? 'shipping-fast'
                                          : (str_contains($s,'receiv') ? 'inbox'
                                          : (str_contains($s,'clear') ? 'shield-check'
                                          : 'info-circle')));
                                @endphp
                                <i class="fas fa-{{ $icon }}"></i>
                            </div>
                            <div class="timeline-content">
                                <div class="timeline-date">
                                    <i class="far fa-calendar-alt"></i> {{ $item->date }}
                                    @if(!empty($item->time)) &nbsp;at&nbsp; {{ $item->time }} @endif
                                </div>
                                <div class="timeline-status">{{ $item->status }}</div>
                                <div class="timeline-location">
                                    <i class="fas fa-map-marker-alt"></i> {{ $item->location }}
                                </div>
                                @if(!empty($item->remarks))
                                <div class="timeline-remarks">
                                    <i class="fas fa-comment-dots"></i> {{ $item->remarks }}
                                </div>
                                @endif
                            </div>
                        </div>
                        @empty
                        <p style="text-align:center; color:var(--text-muted); padding:20px 0;">
                            No tracking history available yet.
                        </p>
                        @endforelse
                    </div>
                </div>
            </div>

        </div>
        <!-- ===== END LEFT COLUMN ===== -->

        <!-- ===== RIGHT / SIDEBAR ===== -->
        <div>

            {{-- QUICK SUMMARY --}}
            <div class="info-card">
                <div class="info-header">
                    <i class="fas fa-clipboard-list"></i> Quick Summary
                </div>
                <div class="info-body">
                    <div class="info-row"><span class="info-label">Package Type</span><span class="info-value">{{ $shipment->package_type }}</span></div>
                    <div class="info-row"><span class="info-label">Total Weight</span><span class="info-value">{{ $shipment->weight }}</span></div>
                    <div class="info-row"><span class="info-label">Shipment Type</span><span class="info-value">{{ $shipment->shipment_type }}</span></div>
                    <div class="info-row"><span class="info-label">Product</span><span class="info-value">{{ $shipment->product }}</span></div>
                    <div class="info-row"><span class="info-label">Value</span><span class="info-value">{{ $shipment->value }}</span></div>
                    <div class="info-row"><span class="info-label">Payment Mode</span><span class="info-value">{{ $shipment->payment_mode }}</span></div>
                    <div class="info-row"><span class="info-label">Total Freight</span><span class="info-value">{{ $shipment->total_freight }}</span></div>
                </div>
            </div>

            {{-- SHIPPING ROUTE --}}
            <div class="info-card">
                <div class="info-header">
                    <i class="fas fa-route"></i> Shipping Route
                </div>
                <div class="info-body">
                    <div class="route-wrap">
                        <div class="route-pin origin"><i class="fas fa-map-pin"></i></div>
                        <div>
                            <div class="route-label">Origin</div>
                            <div class="route-name">{{ $shipment->origin }}</div>
                        </div>
                    </div>
                    <div class="progress-track">
                        <div class="progress-fill" style="width: {{ $shipment->progress_percent ?? '45%' }};"></div>
                    </div>
                    <div class="route-wrap">
                        <div class="route-pin dest"><i class="fas fa-flag-checkered"></i></div>
                        <div>
                            <div class="route-label">Destination</div>
                            <div class="route-name">{{ $shipment->destination }}</div>
                        </div>
                    </div>
                    <p style="font-size:.8rem; color:var(--text-muted); text-align:center; margin-top:8px;">
                        <i class="fas fa-circle-dot" style="color:var(--accent);"></i> {{ $shipment->status }}
                    </p>
                </div>
            </div>

            {{-- ACTIONS --}}
            <div class="info-card no-print">
                <div class="info-header">
                    <i class="fas fa-bolt"></i> Actions
                </div>
                <div class="info-body">
                    <button class="action-btn" onclick="window.print()">
                        <i class="fas fa-print"></i> Print / Save PDF
                    </button>
                    <a href="{{ url('/track-now') }}" class="action-btn action-btn-outline">
                        <i class="fas fa-search"></i> Track Another Shipment
                    </a>
                </div>
            </div>

            {{-- NEED HELP --}}
            <div class="info-card no-print">
                <div class="info-header">
                    <i class="fas fa-headset"></i> Need Help?
                </div>
                <div class="info-body">
                    <p style="font-size:.875rem; color:var(--text-muted); margin-bottom:16px; line-height:1.7;">
                        Our support team is available 24/7 to assist you with any questions about your shipment.
                    </p>
                    <a href="{{ url('/contact') }}" class="action-btn">
                        <i class="fas fa-envelope"></i> Contact Support
                    </a>
                    <div style="margin-top:16px; font-size:.8rem; color:var(--text-muted); text-align:center;">
                        <i class="fas fa-phone-alt" style="color:var(--accent);"></i>
                        &nbsp;+49 (0) 6251 986 620
                    </div>
                </div>
            </div>

        </div>
        <!-- ===== END SIDEBAR ===== -->

    </div>
</div>
<!-- ===== END MAIN CONTENT ===== -->

<!-- ===========================
     FOOTER
=========================== -->
<footer class="track-footer no-print">
    <div class="container">
        <div class="footer-grid">
            <div>
                <div class="footer-col-title">Our Services</div>
                <ul class="footer-links">
                    <li><a href="{{ url('/services') }}"><i class="fas fa-chevron-right"></i> Ocean Freight</a></li>
                    <li><a href="{{ url('/services') }}"><i class="fas fa-chevron-right"></i> Air Cargo</a></li>
                    <li><a href="{{ url('/services') }}"><i class="fas fa-chevron-right"></i> Road Logistics</a></li>
                    <li><a href="{{ url('/services') }}"><i class="fas fa-chevron-right"></i> Warehousing</a></li>
                    <li><a href="{{ url('/services') }}"><i class="fas fa-chevron-right"></i> Customs Brokerage</a></li>
                </ul>
            </div>
            <div>
                <div class="footer-col-title">Contact Us</div>
                <ul class="footer-links">
                    <li><a href="mailto:support@santashiplogistics.org"><i class="fas fa-envelope"></i> support@santashiplogistics.com</a></li>
                    {{-- <li><a href="tel:+49062519866200"><i class="fas fa-phone-alt"></i> +49 (0) 6251 986 620</a></li> --}}
                    <li><a href="#"><i class="fas fa-map-marker-alt"></i> 720 Grand Blvd, Deer Park, NY 11729, USA</a></li>
                </ul>
            </div>
            <div>
                <div class="footer-col-title">Quick Links</div>
                <ul class="footer-links">
                    <li><a href="{{ url('/') }}"><i class="fas fa-chevron-right"></i> Home</a></li>
                    <li><a href="{{ url('/about') }}"><i class="fas fa-chevron-right"></i> About Us</a></li>
                    <li><a href="{{ url('/track-now') }}"><i class="fas fa-chevron-right"></i> Track Shipment</a></li>
                    <li><a href="{{ url('/faq') }}"><i class="fas fa-chevron-right"></i> FAQ</a></li>
                    <li><a href="{{ url('/contact') }}"><i class="fas fa-chevron-right"></i> Contact</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            &copy; {{ date('Y') }} Swifttransitway Company Limited. All Rights Reserved.
        </div>
    </div>
</footer>

<script>
/* ================================================================
   SANTASHIP — LIVE SHIPMENT MAP ENGINE
   • Geocodes each history location via Nominatim (OpenStreetMap)
   • Draws route polyline + markers
   • Pulses the most-recent location
   • Auto-polls the JSON endpoint every 30 s for new history
================================================================ */
(function () {
    const TRACKING   = @json($shipment->tracking_number);
    const API_URL    = '{{ route('shipment.history.json', ['tracking' => ':tracking']) }}'.replace(':tracking', encodeURIComponent(TRACKING));
    const REFRESH_MS = 30000;

    // Leaflet tile layer
    const map = L.map('shipment-map', { zoomControl: true, scrollWheelZoom: false });
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
        maxZoom: 18
    }).addTo(map);

    // Custom marker icons
    function makeIcon(color, pulse) {
        const svg = `<svg xmlns="http://www.w3.org/2000/svg" width="28" height="38" viewBox="0 0 28 38">
            <ellipse cx="14" cy="35" rx="6" ry="3" fill="rgba(0,0,0,0.2)"/>
            <path d="M14 0C7.4 0 2 5.4 2 12c0 9 12 26 12 26S26 21 26 12C26 5.4 20.6 0 14 0z" fill="${color}"/>
            <circle cx="14" cy="12" r="5" fill="white"/>
        </svg>`;
        return L.divIcon({
            html: `<div style="filter:${pulse ? 'drop-shadow(0 0 6px ' + color + ')' : 'none'};animation:${pulse ? 'pulseDot 1.2s infinite' : 'none'}">${svg}</div>`,
            className: '',
            iconSize: [28, 38],
            iconAnchor: [14, 38],
            popupAnchor: [0, -38]
        });
    }

    const originIcon  = makeIcon('#2A5298', false);
    const stopIcon    = makeIcon('#64748B', false);
    const currentIcon = makeIcon('#E8920A', true);
    const destIcon    = makeIcon('#16A34A', false);

    // State
    let markers      = [];
    let polyline     = null;
    let lastCount    = 0;
    let geocodeCache = {};

    // Geocode a location string → [lat, lng]
    async function geocode(location) {
        if (!location) return null;
        const key = location.trim().toLowerCase();
        if (geocodeCache[key]) return geocodeCache[key];
        try {
            const res = await fetch(
                `https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(location)}&limit=1`,
                { headers: { 'Accept-Language': 'en' } }
            );
            const data = await res.json();
            if (data && data.length) {
                const coords = [parseFloat(data[0].lat), parseFloat(data[0].lon)];
                geocodeCache[key] = coords;
                return coords;
            }
        } catch (e) { /* ignore */ }
        return null;
    }

    // Fetch history from JSON API
    async function fetchHistory() {
        const res = await fetch(API_URL);
        if (!res.ok) throw new Error('HTTP ' + res.status);
        return res.json();
    }

    // Clear all map layers (markers + polyline)
    function clearMap() {
        markers.forEach(m => map.removeLayer(m));
        markers = [];
        if (polyline) { map.removeLayer(polyline); polyline = null; }
    }

    // Build / rebuild the map from fresh data
    async function buildMap(data) {
        clearMap();

        const allLocations = [];

        // Origin marker
        const originCoords = await geocode(data.origin);
        if (originCoords) {
            const m = L.marker(originCoords, { icon: originIcon })
                .addTo(map)
                .bindPopup(`<b>📦 Origin</b><br>${data.origin}`);
            markers.push(m);
            allLocations.push(originCoords);
        }

        // History waypoints
        for (let i = 0; i < data.history.length; i++) {
            const h     = data.history[i];
            const isLast = i === data.history.length - 1;
            const coords = await geocode(h.location);
            if (!coords) continue;

            const icon = isLast ? currentIcon : stopIcon;
            const label = isLast ? '📍 Current Location' : `🔹 Stop ${i + 1}`;
            const popup = `<div style="min-width:180px;">
                <b>${label}</b><br>
                <b>${h.status}</b><br>
                📌 ${h.location}<br>
                🕐 ${h.date}${h.time ? ' ' + h.time : ''}
                ${h.remarks ? '<br>💬 ' + h.remarks : ''}
            </div>`;

            const m = L.marker(coords, { icon })
                .addTo(map)
                .bindPopup(popup);

            if (isLast) m.openPopup();
            markers.push(m);
            allLocations.push(coords);
        }

        // Destination marker
        const destCoords = await geocode(data.destination);
        if (destCoords) {
            const m = L.marker(destCoords, { icon: destIcon })
                .addTo(map)
                .bindPopup(`<b>🏁 Destination</b><br>${data.destination}`);
            markers.push(m);
            allLocations.push(destCoords);
        }

        // Polyline connecting all points
        if (allLocations.length > 1) {
            polyline = L.polyline(allLocations, {
                color: '#E8920A',
                weight: 3,
                opacity: 0.75,
                dashArray: '8,5'
            }).addTo(map);
        }

        // Fit map to all points
        if (allLocations.length) {
            map.fitBounds(L.latLngBounds(allLocations).pad(0.25));
        }
    }

    // Update status badge text on page
    function updateStatusBadge(status) {
        const el = document.querySelector('.badge-item strong');
        if (el) el.textContent = status;
    }

    // Main refresh logic
    async function refresh(initial) {
        const syncIcon = document.getElementById('sync-icon');
        if (!initial) syncIcon && syncIcon.classList.add('syncing');

        try {
            const data = await fetchHistory();

            const newCount = data.history.length;
            if (initial || newCount !== lastCount) {
                lastCount = newCount;
                await buildMap(data);
            }

            updateStatusBadge(data.status);

            const now = new Date();
            const el  = document.getElementById('map-last-updated');
            if (el) el.textContent = 'Updated ' + now.toLocaleTimeString();

        } catch (err) {
            console.warn('Map refresh failed:', err);
        } finally {
            // Hide loading overlay on first load
            const loader = document.getElementById('map-loading');
            if (loader) loader.style.display = 'none';
            if (!initial) syncIcon && syncIcon.classList.remove('syncing');
        }
    }

    // Bootstrap
    refresh(true);
    setInterval(() => refresh(false), REFRESH_MS);

})();
</script>

</body>
</html>
