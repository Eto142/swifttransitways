@include('admin.header')

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="page-header">
            <div>
                <h1>Dashboard Overview</h1>
                <p class="text-muted mb-0">Welcome back! Here's what's happening with your shipments today.</p>
            </div>
            <div class="header-actions">
                <button class="notification-btn">
                    <i class="bi bi-bell"></i>
                    <span class="notification-badge">3</span>
                </button>
                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        <i class="bi bi-calendar3 me-2"></i>
                        This Month
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">This Week</a></li>
                        <li><a class="dropdown-item" href="#">This Month</a></li>
                        <li><a class="dropdown-item" href="#">This Quarter</a></li>
                        <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                </div>
            </div>
        </div>


        @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

        <!-- Stats Cards -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon shipments">
                    <i class="bi bi-truck"></i>
                </div>
                <div class="stat-content">
                    <h3>{{ $totalShipments }}</h3>
                    <p>Total Tracking IDs</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon transit">
                    <i class="bi bi-clock-history"></i>
                </div>
                <div class="stat-content">
                    <h3>{{ $inTransit }}</h3>
                    <p>In Transit</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon delivered">
                    <i class="bi bi-check-circle"></i>
                </div>
                <div class="stat-content">
                    <h3>{{ $delivered }}</h3>
                    <p>Delivered</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon pending">
                    <i class="bi bi-exclamation-circle"></i>
                </div>
                <div class="stat-content">
                    <h3>{{ $booked }}</h3>
                    <p>New Bookings</p>
                </div>
            </div>
        </div>

       
        <!-- Quick Actions -->
        <div class="quick-actions">
            <h5>Quick Actions</h5>
            <div class="action-grid">
                <a href="{{ route('admin.book') }}" class="action-btn">
                    <i class="bi bi-plus-circle"></i>
                    <span>Create Tracking ID</span>
                </a>
                <a href="{{ route('admin.shipments') }}" class="action-btn">
                    <i class="bi bi-box-seam"></i>
                    <span>View All Tracking IDs</span>
                </a>
                <a href="{{ route('admin.send.email') }}" class="action-btn">
                    <i class="bi bi-envelope"></i>
                    <span>Send Email</span>
                </a>
                <a href="{{ route('admin.change.password') }}" class="action-btn">
                    <i class="bi bi-shield-lock"></i>
                    <span>Security Settings</span>
                </a>
            </div>
        </div>

        <!-- Recent Shipments Table -->
        <div class="table-card">
            <div class="table-header">
                <h5>Recent Tracking IDs</h5>
                <div class="table-actions">
                    <a href="{{ route('admin.shipments') }}" class="btn btn-sm btn-outline-secondary">
                        <i class="bi bi-list me-1"></i> View All
                </div>
            </div>
            <div class="table-container">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Tracking Number</th>
                            <th>Shipper</th>
                            <th>Receiver</th>
                            <th>Origin</th>
                            <th>Destination</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentShipments as $shipment)
                        <tr>
                            <td><strong>{{ $shipment->tracking_number }}</strong></td>
                            <td>{{ $shipment->shipper_name }}</td>
                            <td>{{ $shipment->receiver_name }}</td>
                            <td>{{ $shipment->origin ?? 'N/A' }}</td>
                            <td>{{ $shipment->destination ?? 'N/A' }}</td>
                            <td>
                                @php
                                    $statusClass = 'status-pending';
                                    if(strtolower($shipment->status) == 'delivered') $statusClass = 'status-delivered';
                                    elseif(strtolower($shipment->status) == 'in transit') $statusClass = 'status-transit';
                                    elseif(strtolower($shipment->status) == 'order received') $statusClass = 'status-processing';
                                @endphp
                                <span class="status-badge {{ $statusClass }}">
                                    <i class="bi bi-circle-fill" style="font-size: 0.5rem;"></i>
                                    {{ $shipment->status }}
                                </span>
                            </td>
                            <td>{{ $shipment->created_at->format('d M Y') }}</td>
           <td>
    <div class="d-flex gap-1 flex-wrap">
        <!-- View Shipment -->
        <a href="{{ route('admin.shipments.show', $shipment->id) }}" 
           class="btn btn-sm btn-primary" 
           title="View">
            <i class="bi bi-eye me-1"></i> View
        </a>

        <!-- Edit Shipment -->
        <a href="{{ route('shipment.edit', $shipment->id) }}"
           class="btn btn-sm btn-primary">
            <i class="bi bi-pencil-square me-1"></i> Edit
        </a>

        <!-- Update Shipping History -->
        <a href="{{ route('shipment.history.edit', $shipment->id) }}"
           class="btn btn-sm btn-primary">
            <i class="bi bi-clock-history me-1"></i> Update History
        </a>

        <!-- Delete Shipment -->
        <form action="{{ route('shipment.destroy', $shipment->id) }}" method="POST"
              onsubmit="return confirm('Are you sure you want to delete this shipment?')">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-danger">
                <i class="bi bi-trash me-1"></i> Delete
            </button>
        </form>
    </div>
</td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center py-4">
                                <div class="text-muted">
                                    <i class="bi bi-inbox" style="font-size: 2rem;"></i>
                                    <p class="mt-2 mb-0">No tracking IDs found</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="p-3 border-top">
                <a href="{{ route('admin.shipments') }}" class="btn btn-link text-decoration-none">
                    View All Tracking IDs <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>
@include('admin.footer')