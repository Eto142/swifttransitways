@include('admin.header')

<div class="main-content">

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h1>Create Tracking Order</h1>
            <p class="text-muted mb-0">Create a new tracking order (Admin)</p>
        </div>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('shipment.store') }}" enctype="multipart/form-data">
        @csrf

        <!-- ================= SHIPMENT DETAILS ================= -->
        <div class="stat-card mb-4">
            <h5 class="section-title">Shipment Details</h5>

            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">Tracking Number</label>
                    <input type="text" name="tracking_number" class="form-control" value="{{ strtoupper(Str::random(8)) }}" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Reference No</label>
                    <input type="text" name="reference_no" class="form-control" placeholder="e.g. REF-2026-001">
                </div>

                <div class="col-md-4">
                    <label class="form-label">Carrier</label>
                    <input type="text" name="carrier" class="form-control" placeholder="e.g. FedEx, DHL, UPS">
                </div>

                <div class="col-md-4">
                    <label class="form-label">Origin</label>
                    <input type="text" name="origin" class="form-control" placeholder="e.g. New York, USA" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Destination</label>
                    <input type="text" name="destination" class="form-control" placeholder="e.g. London, UK" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Shipment Mode</label>
                    <input type="text" name="shipment_mode" class="form-control" placeholder="e.g. Air Freight">
                </div>

                <div class="col-md-4">
                    <label class="form-label">Package Name</label>
                    <input type="text" name="product" class="form-control" placeholder="e.g. Electronics, Documents">
                </div>
            </div>
        </div>

        <!-- ================= TIMING ================= -->
        <div class="stat-card mb-4">
            <h5 class="section-title">Timing Information</h5>
            <div class="row g-3">
                <div class="col-md-3">
                    <label class="form-label">Departure Time</label>
                    <input type="text" name="departure_time" class="form-control" placeholder="e.g. 2026-03-25 14:00">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Expected Delivery Date</label>
                    <input type="text" name="expected_delivery_date" class="form-control" placeholder="e.g. 2026-03-30">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Pickup Date</label>
                    <input type="text" name="pickup_date" class="form-control" placeholder="e.g. 2026-03-24">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Pickup Time</label>
                    <input type="text" name="pickup_time" class="form-control" placeholder="e.g. 10:00 AM">
                </div>
            </div>
        </div>

        <!-- ================= SHIPPER ================= -->
        <div class="stat-card mb-4">
            <h5 class="section-title">Sender Information</h5>

            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">Sender Name</label>
                    <input name="shipper_name" class="form-control" placeholder="e.g. John Doe" required>
                </div>

                {{-- <div class="col-md-4">
                    <label class="form-label">Company Name</label>
                    <input name="shipper_company" class="form-control">
                </div> --}}

                <div class="col-md-4">
                    <label class="form-label">Address</label>
                    <input name="shipper_address" class="form-control" placeholder="e.g. 123 Main Street" required>
                </div>

                <div class="col-md-3">
                    <label class="form-label">City</label>
                    <input name="shipper_city" class="form-control" placeholder="e.g. New York">
                </div>

                <div class="col-md-3">
                    <label class="form-label">Country</label>
                    <input name="shipper_country" class="form-control" placeholder="e.g. United States">
                </div>

                <div class="col-md-3">
                    <label class="form-label">Phone</label>
                    <input name="shipper_phone" class="form-control" placeholder="e.g. +1 234 567 8900">
                </div>

                <div class="col-md-3">
                    <label class="form-label">Postal Code</label>
                    <input name="shipper_postal_code" class="form-control" placeholder="e.g. 10001">
                </div>
            </div>
        </div>

        <!-- ================= RECEIVER ================= -->
        <div class="stat-card mb-4">
            <h5 class="section-title">Receiver Information</h5>

            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">Receiver Name</label>
                    <input name="receiver_name" class="form-control" placeholder="e.g. Jane Smith" required>
                </div>

                {{-- <div class="col-md-4">
                    <label class="form-label">Company Name</label>
                    <input name="receiver_company" class="form-control">
                </div> --}}

                <div class="col-md-4">
                    <label class="form-label">Address</label>
                    <input name="receiver_address" class="form-control" placeholder="e.g. 456 Elm Street" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">City</label>
                    <input name="receiver_city" class="form-control" placeholder="e.g. London">
                </div>

                <div class="col-md-4">
                    <label class="form-label">Country</label>
                    <input name="receiver_country" class="form-control" placeholder="e.g. United Kingdom">
                </div>
            </div>
        </div>

        <!-- ================= CARGO ================= -->
        <div class="stat-card mb-4">
            <h5 class="section-title">Tracking Details</h5>

            <div class="row g-3">
                <div class="col-md-2">
                    <label class="form-label">Quantity</label>
                    <input name="quantity" type="number" class="form-control" placeholder="e.g. 1">
                </div>

                <div class="col-md-2">
                    <label class="form-label">Weight</label>
                    <input name="weight" class="form-control" placeholder="e.g. 2.5 kg">
                </div>

                <div class="col-md-4">
                    <label class="form-label">Description</label>
                    <input name="description" class="form-control" placeholder="e.g. Fragile electronics">
                </div>

                <div class="col-12">
                    <label class="form-label">Comments</label>
                    <textarea name="comments" class="form-control" rows="2" placeholder="e.g. Handle with care, keep dry"></textarea>
                </div>
            </div>
        </div>

        <!-- ================= STATUS & PAYMENT ================= -->
        <div class="stat-card mb-4">
            <h5 class="section-title">Status & Payment</h5>

            <div class="row g-3">
                <div class="col-md-3">
                    <label class="form-label">Initial Status</label>
                    <input name="status" type="text" class="form-control" value="Order Received" required>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Value</label>
                    <input name="value" type="text" class="form-control" placeholder="e.g. 500.00">
                </div>

                <div class="col-md-3">
                    <label class="form-label">Payment Mode</label>
                    <input name="payment_mode" type="text" class="form-control" placeholder="e.g. Prepaid, Cash, Credit">
                </div>

                <div class="col-md-3">
                    <label class="form-label">Total Freight</label>
                    <input name="total_freight" type="text" class="form-control" placeholder="e.g. 150.00">
                </div>
            </div>
        </div>

        <!-- ================= PACKAGE IMAGE ================= -->
        <div class="stat-card mb-4">
            <h5 class="section-title">Package Image <span class="text-muted" style="font-size:.85rem;font-weight:400;">(optional)</span></h5>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Upload Package Photo</label>
                    <input type="file" name="image" id="packageImageInput" class="form-control" accept="image/jpeg,image/png,image/jpg,image/gif" onchange="previewPackageImage(event)">
                    <div class="form-text">JPG, PNG or GIF — max 5 MB</div>
                </div>
                <div class="col-md-6 d-flex align-items-center justify-content-center">
                    <div id="imagePreviewWrap" style="display:none; text-align:center;">
                        <img id="imagePreview" src="" alt="Preview" style="max-height:180px; max-width:100%; border-radius:10px; border:2px solid #dee2e6; box-shadow:0 4px 12px rgba(0,0,0,.1);">
                        <div class="mt-2">
                            <button type="button" class="btn btn-sm btn-outline-danger" onclick="clearPackageImage()">
                                <i class="bi bi-x-circle me-1"></i> Remove
                            </button>
                        </div>
                    </div>
                    <div id="imagePlaceholder" style="width:100%; height:140px; border:2px dashed #dee2e6; border-radius:10px; display:flex; align-items:center; justify-content:center; color:#adb5bd; flex-direction:column; gap:8px;">
                        <i class="bi bi-image" style="font-size:2rem;"></i>
                        <span style="font-size:.85rem;">Image preview</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-end mb-4">
            <button class="btn btn-primary px-5 py-2">
                <i class="fas fa-save me-2"></i> Create Tracking Order
            </button>
        </div>

    </form>
</div>

@include('admin.footer')







<!-- AWB Success Modal -->
@if(session('awb_number'))
<div class="modal fade show awb-success-modal" id="awbModal" tabindex="-1" aria-modal="true" role="dialog" style="display:block;">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content shadow-lg border-0 rounded-4">
            
            <div class="modal-body text-center p-4">
                <!-- Icon -->
                <div class="mb-3">
                    <span class="success-icon">✓</span>
                </div>

                <!-- Title -->
                <h5 class="fw-semibold mb-2">Shipment Booked</h5>
                <p class="text-muted small mb-3">
                    Your shipment has been registered successfully.
                </p>

                <!-- AWB -->
                <div class="awb-box mb-4">
                    <span class="label">AWB Number</span>
                    <strong>{{ session('awb_number') }}</strong>
                </div>

                <!-- Action -->
                <a href="{{ session('pdf_path') }}" class="btn btn-primary w-100" download>
                    Download Receipt (PDF)
                </a>

                <p class="text-muted small mt-3">
                    This window will close automatically.
                </p>
            </div>
        </div>
    </div>
</div>

<div class="modal-backdrop fade show"></div>

<script>
    setTimeout(() => {
        const modal = document.getElementById('awbModal');
        modal.classList.remove('show');
        modal.style.display = 'none';
        document.querySelector('.modal-backdrop')?.remove();
    }, 10000);
</script>
@endif


<script>
    function previewPackageImage(event) {
        const file = event.target.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('imagePreview').src = e.target.result;
            document.getElementById('imagePreviewWrap').style.display = 'block';
            document.getElementById('imagePlaceholder').style.display = 'none';
        };
        reader.readAsDataURL(file);
    }

    function clearPackageImage() {
        document.getElementById('packageImageInput').value = '';
        document.getElementById('imagePreview').src = '';
        document.getElementById('imagePreviewWrap').style.display = 'none';
        document.getElementById('imagePlaceholder').style.display = 'flex';
    }
</script>

<script>
    // Trigger PDF download automatically
    document.addEventListener('DOMContentLoaded', function () {
        @if(session('pdf_path'))
        const link = document.createElement('a');
        link.href = "{{ session('pdf_path') }}";
        link.download = "awb_{{ session('awb_number') }}.pdf";
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        @endif
    });
</script>

<style>

    .awb-success-modal .modal-content {
    animation: scaleIn 0.25s ease-out;
}

@keyframes scaleIn {
    from {
        transform: scale(0.95);
        opacity: 0;
    }
    to {
        transform: scale(1);
        opacity: 1;
    }
}

.success-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 60px;
    height: 60px;
    background: #e0f2fe;
    color: #0369a1;
    font-size: 28px;
    font-weight: bold;
    border-radius: 50%;
}

.awb-box {
    background: #f8f9fa;
    border-radius: 12px;
    padding: 12px;
}

.awb-box .label {
    display: block;
    font-size: 12px;
    color: #6c757d;
    margin-bottom: 2px;
}

</style>

