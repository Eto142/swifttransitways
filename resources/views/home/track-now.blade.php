@push('styles')
<link rel='stylesheet' id='elementor-post-229-css' href='{{ asset('wp-content/uploads/elementor/css/post-229ee66.css') }}' media='all'/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<style>
    .hero-section { min-height: 400px; position: relative; }
    .carousel-item { height: 400px; background-size: cover; background-position: center; position: relative; }
    .carousel-overlay {
        position: absolute; top: 0; left: 0; width: 100%; height: 100%;
        background: rgba(0,0,0,0.4); display: flex; flex-direction: column;
        justify-content: center; align-items: center; color: white;
        text-align: center; padding: 0 20px;
    }
    .carousel-title { font-size: 3rem; font-weight: 700; margin-bottom: 15px; }
    .carousel-subtitle { font-size: 1.2rem; font-weight: 400; }
    .tracking-form-section {
        background: #f5f5f5; padding: 100px 15px 120px;
        border-radius: 30px 30px 0 0; margin-top: -50px;
    }
    .tracking-card {
        background: white; border-radius: 20px; padding: 40px;
        max-width: 900px; margin: 0 auto;
        box-shadow: 0 6px 15px rgba(0,0,0,0.1);
    }
    .form-label { font-weight: 600; color: #333; }
    .awb-input { border: 1px solid #ddd; padding: 12px 15px; font-size: 1rem; }
    .track-btn { background: #003366; border: none; font-weight: 600; }
    .track-btn:hover { background: #001f3f; }
    @media (max-width: 768px) { .carousel-title { font-size: 2rem; } }
</style>
@endpush

@include('partials.header')

<!-- Hero Carousel -->
<section class="hero-section">
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" style="background-image: url('https://images.unsplash.com/photo-1590073241936-8db6351b3c56?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&w=1200');">
                <div class="carousel-overlay">
                    <h1 class="carousel-title">Safe Package Handling</h1>
                    <p class="carousel-subtitle">We ensure every package is handled with care from pickup to delivery.</p>
                </div>
            </div>
            <div class="carousel-item" style="background-image: url('https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&w=1200');">
                <div class="carousel-overlay">
                    <h1 class="carousel-title">Fast Delivery</h1>
                    <p class="carousel-subtitle">Track your shipment and receive it quickly with our reliable logistics network.</p>
                </div>
            </div>
            <div class="carousel-item" style="background-image: url('https://images.unsplash.com/photo-1581091012184-d8f6507c04fc?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&w=1200');">
                <div class="carousel-overlay">
                    <h1 class="carousel-title">Track & Manage</h1>
                    <p class="carousel-subtitle">Our advanced hub ensures shipments are monitored at every step.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</section>

<!-- Tracking Form -->
<section class="tracking-form-section">
    <div class="container">
        <div class="tracking-card">

            @if($errors->any())
                <div class="alert alert-danger">{{ $errors->first('tracking_number') }}</div>
            @endif

            <form method="POST" action="{{ route('track.submit') }}">
                @csrf
                <div class="row align-items-end g-3">
                    <div class="col-md-9">
                        <label class="form-label">Tracking Number</label>
                        <input type="text" name="tracking_number" class="form-control awb-input"
                            placeholder="Enter Tracking Number (e.g. BGL-XXXXXXXX)"
                            value="{{ old('tracking_number') }}" required autocomplete="off">
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary track-btn w-100">TRACK SHIPMENT</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

@include('partials.footer')
