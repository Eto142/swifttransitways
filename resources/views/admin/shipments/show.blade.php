@include('admin.header')
<!-- Main Content -->
<div class="main-content">

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h1>Shipment Details</h1>
            <p class="text-muted mb-0">Tracking Number: <strong>{{ $shipment->tracking_number }}</strong></p>
        </div>

        <a href="{{ route('admin.shipments') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Back to Shipments
        </a>
    </div>

    <!-- Status & Action Row -->
    <h5 class="mb-3">Master Status</h5>
    <div class="stat-card mb-4">
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">

            <span class="status-badge status-transit">
                <i class="bi bi-truck"></i> {{ $shipment->status }}
            </span>

            <form action="{{ route('admin.shipments.status', $shipment->id) }}" method="POST" class="d-flex gap-2">
                @csrf
               
                <input
                    type="text"
                    name="status"
                    class="form-control form-control-sm"
                    value="{{ $shipment->status }}"
                    placeholder="Enter shipment status"
                    required
                >
                <button class="btn btn-primary btn-sm">
                    Update Status
                </button>
            </form>

        </div>
    </div>

    <!-- Details Grid -->
    <div class="row g-4">

        <!-- Shipment Info -->
        <div class="col-lg-4">
            <div class="stat-card h-100">
                <h5 class="mb-3">Shipment Overview</h5>

                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Origin</span>
                    <strong>{{ $shipment->origin }}</strong>
                </div>

                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Destination</span>
                    <strong>{{ $shipment->destination }}</strong>
                </div>

                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Carrier</span>
                    <strong>{{ $shipment->carrier ?? 'N/A' }}</strong>
                </div>

                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Shipment Mode</span>
                    <strong>{{ $shipment->shipment_mode ?? 'N/A' }}</strong>
                </div>

                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Ref No</span>
                    <strong>{{ $shipment->reference_no ?? 'N/A' }}</strong>
                </div>

                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Shipment Date</span>
                    <strong>{{ optional($shipment->shipment_date)->format('d M Y') ?? 'N/A' }}</strong>
                </div>

                <div class="d-flex justify-content-between">
                    <span class="text-muted">Type</span>
                    <strong>{{ $shipment->shipment_type }}</strong>
                </div>
            </div>
        </div>

        <!-- Timing -->
        <div class="col-lg-4">
            <div class="stat-card h-100">
                <h5 class="mb-3">Timing & Schedules</h5>

                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Departure Time</span>
                    <strong>{{ $shipment->departure_time ?? 'N/A' }}</strong>
                </div>

                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Expected Delivery</span>
                    <strong>{{ $shipment->expected_delivery_date ?? 'N/A' }}</strong>
                </div>

                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Pickup Date</span>
                    <strong>{{ $shipment->pickup_date ?? 'N/A' }}</strong>
                </div>

                <div class="d-flex justify-content-between">
                    <span class="text-muted">Pickup Time</span>
                    <strong>{{ $shipment->pickup_time ?? 'N/A' }}</strong>
                </div>
            </div>
        </div>

        <!-- Cargo -->
        <div class="col-lg-4">
            <div class="stat-card h-100">
                <h5 class="mb-3">Cargo Specifications</h5>

                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Quantity</span>
                    <strong>{{ $shipment->quantity }} {{ $shipment->piece_type }}</strong>
                </div>

                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Weight</span>
                    <strong>{{ $shipment->weight }} kg</strong>
                </div>

                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Height</span>
                    <strong>{{ $shipment->height ?? 'N/A' }}</strong>
                </div>

                <div class="d-flex justify-content-between">
                    <span class="text-muted">Package Type</span>
                    <strong>{{ $shipment->package_type ?? 'N/A' }}</strong>
                </div>
            </div>
        </div>

        <!-- Shipper -->
        <div class="col-lg-6">
            <div class="stat-card">
                <h5 class="mb-3">Shipper / Consignor</h5>

                <p class="mb-1"><strong>Name:</strong> {{ $shipment->shipper_name }}</p>
                <p class="mb-1"><strong>Company:</strong> {{ $shipment->shipper_company ?? 'N/A' }}</p>
                <p class="mb-1"><strong>Phone:</strong> {{ $shipment->shipper_phone ?? 'N/A' }}</p>
                <p class="mb-0 text-muted">
                    <strong>Address:</strong> {{ $shipment->shipper_address }}, 
                    {{ $shipment->shipper_city }}, 
                    {{ $shipment->shipper_country }}<br>
                    <strong>Postal Code:</strong> {{ $shipment->shipper_postal_code ?? 'N/A' }}
                </p>
            </div>
        </div>

        <!-- Receiver -->
        <div class="col-lg-6">
            <div class="stat-card">
                <h5 class="mb-3">Receiver / Consignee</h5>

                <p class="mb-1"><strong>Name:</strong> {{ $shipment->receiver_name }}</p>
                <p class="mb-1"><strong>Company:</strong> {{ $shipment->receiver_company ?? 'N/A' }}</p>
                <p class="mb-0 text-muted">
                    <strong>Address:</strong> {{ $shipment->receiver_address }}, 
                    {{ $shipment->receiver_city }}, 
                    {{ $shipment->receiver_country }}
                </p>
            </div>
        </div>

        <!-- Financials -->
        <div class="col-12">
            <div class="stat-card">
                <h5 class="mb-3">Logistics Data & Financials</h5>

                <div class="row text-center">
                    <div class="col-md-3">
                        <p class="text-muted mb-1">Declared Value</p>
                        <h6>{{ $shipment->value ?? 'N/A' }}</h6>
                    </div>
                    <div class="col-md-3">
                        <p class="text-muted mb-1">Total Freight</p>
                        <h6>{{ $shipment->total_freight ?? 'N/A' }}</h6>
                    </div>
                    <div class="col-md-3">
                        <p class="text-muted mb-1">Payment Mode</p>
                        <h6>{{ $shipment->payment_mode ?? 'N/A' }}</h6>
                    </div>
                    <div class="col-md-3">
                        <p class="text-muted mb-1">Description</p>
                        <p class="small">{{ $shipment->description }}</p>
                    </div>
                </div>
            </div>
        </div>

        @if($shipment->comments)
        <div class="col-12">
            <div class="alert alert-info">
                <strong>Admin Comments:</strong> {{ $shipment->comments }}
            </div>
        </div>
        @endif

    </div>
</div>
@include('admin.footer')