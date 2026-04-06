@push('styles')
<link rel='stylesheet' id='elementor-post-229-css' href='{{ asset('wp-content/uploads/elementor/css/post-229ee66.css') }}' media='all'/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<style>
    /* ── Hero ── */
    .hero-section { position: relative; overflow: hidden; }

    /* Ken-Burns CSS slideshow — no JS / no failed network images */
    .hero-bg {
        position: relative;
        height: 600px;
        overflow: hidden;
    }
    .hero-slide {
        position: absolute; inset: 0;
        background-size: cover;
        background-position: center;
        opacity: 0;
        animation: heroFade 18s infinite;
        transform: scale(1.04);
        animation-timing-function: ease-in-out;
    }
    .hero-slide:nth-child(1) { animation-delay: 0s; }
    .hero-slide:nth-child(2) { animation-delay: 6s; }
    .hero-slide:nth-child(3) { animation-delay: 12s; }
    @keyframes heroFade {
        0%   { opacity: 0; transform: scale(1.04); }
        8%   { opacity: 1; transform: scale(1); }
        33%  { opacity: 1; transform: scale(1); }
        40%  { opacity: 0; transform: scale(1.04); }
        100% { opacity: 0; transform: scale(1.04); }
    }
    .hero-overlay {
        position: absolute; inset: 0;
        background: linear-gradient(160deg, rgba(30,30,30,.72) 0%, rgba(176,30,22,.58) 100%);
        display: flex; flex-direction: column;
        justify-content: flex-start; align-items: center;
        text-align: center; padding: 52px 20px 0;
        z-index: 2;
    }
    .carousel-title  { font-size: 2.6rem; font-weight: 700; color: #fff; margin-bottom: 8px; line-height: 1.2; }
    .carousel-subtitle { font-size: 1.05rem; color: rgba(255,255,255,.8); }

    /* ── Form overlay ── */
    .track-form-overlay {
        position: absolute;
        top: 50%; left: 50%;
        transform: translate(-50%, -50%);
        width: 100%; max-width: 760px;
        padding: 0 16px;
        z-index: 20;
    }
    .tracking-card {
        background: #fff;
        border-radius: 16px;
        padding: 32px 36px 28px;
        box-shadow: 0 8px 48px rgba(0,0,0,.28);
        border-top: 5px solid #B01E16;
    }
    .tracking-card .card-eyebrow {
        font-size: .72rem;
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase;
        color: #B01E16;
        margin-bottom: 4px;
    }
    .tracking-card h2 {
        font-size: 1.45rem;
        font-weight: 700;
        color: #2D2D2D;
        margin-bottom: 20px;
        line-height: 1.2;
    }
    .awb-input {
        border: 2px solid #E2D8D7;
        padding: 14px 18px;
        font-size: 1.05rem;
        border-radius: 10px 0 0 10px !important;
        transition: border-color .2s;
    }
    .awb-input:focus {
        border-color: #B01E16;
        box-shadow: none;
        outline: none;
    }
    .track-btn {
        background: #B01E16;
        border: none;
        font-weight: 700;
        font-size: 1rem;
        padding: 14px 28px;
        border-radius: 0 10px 10px 0 !important;
        white-space: nowrap;
        letter-spacing: .4px;
    }
    .track-btn:hover { background: #8C1510; }
    .tracking-card .form-hint {
        font-size: .78rem;
        color: #94A3B8;
        margin-top: 10px;
    }
    .tracking-card .form-hint i { color: #FF7900; }

    /* extra space below carousel so the card doesn't sit over content */
    .hero-section { margin-bottom: 0; }
    .after-hero-spacer { height: 80px; background: #fff; }

    @media (max-width: 768px) {
        .hero-bg { height: 540px; }
        .carousel-title { font-size: 1.8rem; }
        .tracking-card { padding: 24px 20px 20px; border-radius: 12px; }
        .awb-input { border-radius: 10px !important; font-size: .95rem; }
        .track-btn { border-radius: 10px !important; margin-top: 10px; width: 100%; }
    }
    @media (max-width: 480px) {
        .hero-bg { height: 480px; }
        .tracking-card h2 { font-size: 1.2rem; }
    }
</style>
@endpush

@include('partials.header')

<!-- Hero + Tracking Form -->
<section class="hero-section">
    <div class="hero-bg">
        <div class="hero-slide" style="background-image:url('{{ asset('assets/images/aerial-view-cargo-ship-cargo-container-harbor.jpg') }}')"></div>
        <div class="hero-slide" style="background-image:url('{{ asset('assets/images/cargo-ship-sailing-through-ocean.jpg') }}')"></div>
        <div class="hero-slide" style="background-image:url('{{ asset('assets/images/air-cargo.jpg') }}')"></div>

        <div class="hero-overlay">
            <h1 class="carousel-title">Swift &amp; Reliable Worldwide Shipping</h1>
            <p class="carousel-subtitle">Track your shipment in real time  from pickup to final delivery.</p>
        </div>
    </div>

    <!-- Tracking form sits at the bottom of the hero -->
    <div class="track-form-overlay">
        <div class="tracking-card">
            <p class="card-eyebrow"><i class="bi bi-geo-alt-fill"></i> &nbsp;Shipment Tracker</p>
            <h2>Enter your tracking number to get live updates</h2>

            @if($errors->any())
                <div class="alert alert-danger py-2 mb-3">{{ $errors->first('tracking_number') }}</div>
            @endif

            <form method="POST" action="{{ route('track.submit') }}">
                @csrf
                <div class="input-group input-group-lg">
                    <input type="text" name="tracking_number"
                        class="form-control awb-input"
                        placeholder="e.g. ZAH-7500-10171-77305"
                        value="{{ old('tracking_number') }}"
                        required autocomplete="off">
                    <button type="submit" class="btn btn-primary track-btn">
                        <i class="bi bi-search me-1"></i> TRACK
                    </button>
                </div>
                <p class="form-hint">
                    <i class="bi bi-info-circle-fill"></i>
                    Enter your AWB / tracking number exactly as provided in your confirmation.
                </p>
            </form>
        </div>
    </div>
</section>

<!-- White spacer so footer doesn't stick to the form card -->
<div class="after-hero-spacer"></div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

@include('partials.footer')
