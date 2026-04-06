@include('admin.header')

<div class="main-content">

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h1>Edit Shipment</h1>
            <p class="text-muted mb-0">Update shipment details (Admin)</p>
        </div>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Validation Errors --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- UPDATE FORM -->
    <form method="POST" action="{{ route('shipment.update', $shipment->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- ================= SHIPMENT DETAILS ================= -->
        <div class="stat-card mb-4">
            <h5 class="section-title">Shipment Details</h5>

            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">Tracking Number</label>
                    <input type="text" name="tracking_number" class="form-control" value="{{ old('tracking_number', $shipment->tracking_number) }}" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Reference No</label>
                    <input type="text" name="reference_no" class="form-control" value="{{ old('reference_no', $shipment->reference_no) }}">
                </div>

                <div class="col-md-4">
                    <label class="form-label">Carrier</label>
                    <input type="text" name="carrier" class="form-control" value="{{ old('carrier', $shipment->carrier) }}">
                </div>

                <div class="col-md-4">
                    <label class="form-label">Origin</label>
                    <input type="text" name="origin" class="form-control" value="{{ old('origin', $shipment->origin) }}" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Destination</label>
                    <input type="text" name="destination" class="form-control" value="{{ old('destination', $shipment->destination) }}" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Shipment Mode</label>
                    <input type="text" name="shipment_mode" class="form-control" value="{{ old('shipment_mode', $shipment->shipment_mode) }}">
                </div>

                <div class="col-md-4">
                    <label class="form-label">Shipment Type</label>
                    <input type="text" name="shipment_type" class="form-control" value="{{ old('shipment_type', $shipment->shipment_type) }}">
                </div>

                <div class="col-md-4">
                    <label class="form-label">Package Type</label>
                    <input type="text" name="package_type" class="form-control" value="{{ old('package_type', $shipment->package_type) }}">
                </div>

                <div class="col-md-4">
                    <label class="form-label">Package Name</label>
                    <input type="text" name="product" class="form-control" value="{{ old('product', $shipment->product) }}">
                </div>
            </div>
        </div>

        <!-- ================= TIMING ================= -->
        <div class="stat-card mb-4">
            <h5 class="section-title">Timing Information</h5>
            <div class="row g-3">
                <div class="col-md-3">
                    <label class="form-label">Departure Time</label>
                    <input type="text" name="departure_time" class="form-control" value="{{ old('departure_time', $shipment->departure_time) }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Expected Delivery Date</label>
                    <input type="text" name="expected_delivery_date" class="form-control" value="{{ old('expected_delivery_date', $shipment->expected_delivery_date) }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Pickup Date</label>
                    <input type="text" name="pickup_date" class="form-control" value="{{ old('pickup_date', $shipment->pickup_date) }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Pickup Time</label>
                    <input type="text" name="pickup_time" class="form-control" value="{{ old('pickup_time', $shipment->pickup_time) }}">
                </div>
            </div>
        </div>

        <!-- ================= SHIPPER ================= -->
        <div class="stat-card mb-4">
            <h5 class="section-title">Sender Information</h5>

            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">Sender Name</label>
                    <input name="shipper_name" class="form-control" value="{{ old('shipper_name', $shipment->shipper_name) }}" required>
                </div>

                {{-- <div class="col-md-4">
                    <label class="form-label">Company Name</label>
                    <input name="shipper_company" class="form-control" value="{{ old('shipper_company', $shipment->shipper_company) }}">
                </div> --}}

                <div class="col-md-4">
                    <label class="form-label">Address</label>
                    <input name="shipper_address" class="form-control" value="{{ old('shipper_address', $shipment->shipper_address) }}" required>
                </div>

                <div class="col-md-3">
                    <label class="form-label">City</label>
                    <input name="shipper_city" class="form-control" value="{{ old('shipper_city', $shipment->shipper_city) }}">
                </div>

                <div class="col-md-3">
                    <label class="form-label">Country</label>
                    <input name="shipper_country" class="form-control" value="{{ old('shipper_country', $shipment->shipper_country) }}">
                </div>

                <div class="col-md-3">
                    <label class="form-label">Phone</label>
                    <input name="shipper_phone" class="form-control" value="{{ old('shipper_phone', $shipment->shipper_phone) }}">
                </div>

                <div class="col-md-3">
                    <label class="form-label">Postal Code</label>
                    <input name="shipper_postal_code" class="form-control" value="{{ old('shipper_postal_code', $shipment->shipper_postal_code) }}">
                </div>
            </div>
        </div>

        <!-- ================= RECEIVER ================= -->
        <div class="stat-card mb-4">
            <h5 class="section-title">Receiver Information</h5>

            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">Receiver Name</label>
                    <input name="receiver_name" class="form-control" value="{{ old('receiver_name', $shipment->receiver_name) }}" required>
                </div>

                {{-- <div class="col-md-4">
                    <label class="form-label">Company Name</label>
                    <input name="receiver_company" class="form-control" value="{{ old('receiver_company', $shipment->receiver_company) }}">
                </div> --}}

                <div class="col-md-4">
                    <label class="form-label">Address</label>
                    <input name="receiver_address" class="form-control" value="{{ old('receiver_address', $shipment->receiver_address) }}" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">City</label>
                    <input name="receiver_city" class="form-control" value="{{ old('receiver_city', $shipment->receiver_city) }}">
                </div>

                <div class="col-md-4">
                    <label class="form-label">Country</label>
                    <input name="receiver_country" class="form-control" value="{{ old('receiver_country', $shipment->receiver_country) }}">
                </div>
            </div>
        </div>

        <!-- ================= CARGO ================= -->
        <div class="stat-card mb-4">
            <h5 class="section-title">Tracking Details</h5>

            <div class="row g-3">
                <div class="col-md-2">
                    <label class="form-label">Quantity</label>
                    <input name="quantity" type="number" class="form-control" value="{{ old('quantity', $shipment->quantity) }}">
                </div>

                <div class="col-md-2">
                    <label class="form-label">Piece Type</label>
                    <input name="piece_type" class="form-control" value="{{ old('piece_type', $shipment->piece_type) }}">
                </div>

                <div class="col-md-2">
                    <label class="form-label">Height</label>
                    <input name="height" class="form-control" value="{{ old('height', $shipment->height) }}">
                </div>

                <div class="col-md-2">
                    <label class="form-label">Weight</label>
                    <input name="weight" class="form-control" value="{{ old('weight', $shipment->weight) }}">
                </div>

                <div class="col-md-4">
                    <label class="form-label">Description</label>
                    <input name="description" class="form-control" value="{{ old('description', $shipment->description) }}">
                </div>

                <div class="col-12">
                    <label class="form-label">Comments</label>
                    <textarea name="comments" class="form-control" rows="2">{{ old('comments', $shipment->comments) }}</textarea>
                </div>
            </div>
        </div>

        <!-- ================= STATUS & PAYMENT ================= -->
        <div class="stat-card mb-4">
            <h5 class="section-title">Status & Payment</h5>

            <div class="row g-3">
                <div class="col-md-3">
                    <label class="form-label">Status</label>
                    <input name="status" type="text" class="form-control" value="{{ old('status', $shipment->status) }}" required>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Value</label>
                    <input name="value" type="text" class="form-control" value="{{ old('value', $shipment->value) }}">
                </div>

                <div class="col-md-3">
                    <label class="form-label">Payment Mode</label>
                    <input name="payment_mode" type="text" class="form-control" value="{{ old('payment_mode', $shipment->payment_mode) }}">
                </div>

                <div class="col-md-3">
                    <label class="form-label">Total Freight</label>
                    <input name="total_freight" type="text" class="form-control" value="{{ old('total_freight', $shipment->total_freight) }}">
                </div>

                <div class="col-12 d-flex gap-2">
                    <button class="btn btn-primary px-4"><i class="fas fa-save me-2"></i> Update Shipment</button>
                    <a href="{{ route('admin.book') }}" class="btn btn-secondary px-4">Cancel</a>
                </div>
            </div>
        </div>

        <!-- ================= PACKAGE IMAGE ================= -->
        <div class="stat-card mb-4">
            <h5 class="section-title">Package Image <span class="text-muted" style="font-size:.85rem;font-weight:400;">(optional)</span></h5>
            <div class="row g-3">
                <div class="col-md-6">
                    @if(!empty($shipment->image))
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Current Image</label><br>
                        <img src="{{ asset($shipment->image) }}" alt="Current package image"
                             style="max-height:160px; border-radius:10px; border:2px solid #dee2e6; box-shadow:0 4px 12px rgba(0,0,0,.08);">
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="checkbox" name="remove_image" id="removeImage" value="1">
                            <label class="form-check-label text-danger" for="removeImage">Remove current image</label>
                        </div>
                    </div>
                    @endif
                    <label class="form-label">{{ !empty($shipment->image) ? 'Replace with new image' : 'Upload Package Photo' }}</label>
                    <input type="file" name="image" id="packageImageInput" class="form-control" accept="image/jpeg,image/png,image/jpg,image/gif" onchange="previewPackageImage(event)">
                    <div class="form-text">JPG, PNG or GIF — max 5 MB</div>
                </div>
                <div class="col-md-6 d-flex align-items-center justify-content-center">
                    <div id="imagePreviewWrap" style="display:none; text-align:center;">
                        <img id="imagePreview" src="" alt="Preview" style="max-height:180px; max-width:100%; border-radius:10px; border:2px solid #dee2e6; box-shadow:0 4px 12px rgba(0,0,0,.1);">
                        <div class="mt-2">
                            <button type="button" class="btn btn-sm btn-outline-danger" onclick="clearPackageImage()">
                                <i class="bi bi-x-circle me-1"></i> Remove New
                            </button>
                        </div>
                    </div>
                    <div id="imagePlaceholder" style="width:100%; height:140px; border:2px dashed #dee2e6; border-radius:10px; display:flex; align-items:center; justify-content:center; color:#adb5bd; flex-direction:column; gap:8px;">
                        <i class="bi bi-image" style="font-size:2rem;"></i>
                        <span style="font-size:.85rem;">New image preview</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-end mb-4">
            <button class="btn btn-primary px-5 py-2"><i class="fas fa-save me-2"></i> Update Shipment</button>
            <a href="{{ route('admin.book') }}" class="btn btn-secondary px-4 ms-2">Cancel</a>
        </div>

    </form>
</div>

@include('admin.footer')

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
