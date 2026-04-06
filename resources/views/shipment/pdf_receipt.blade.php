<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Shipment Receipt</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 11px; color: #333; margin: 20px; }
        .header { text-align: center; margin-bottom: 20px; }
        .logo { max-width: 140px; margin-bottom: 10px; }
        h2 { margin: 5px 0; color: #003366; font-size: 18px; }
        .section { margin-bottom: 15px; }
        h4 { margin: 0 0 8px 0; color: #003366; border-bottom: 2px solid #003366; padding-bottom: 3px; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 10px; }
        th, td { border: 1px solid #ddd; padding: 6px; text-align: left; }
        th { background-color: #f7f7f7; width: 30%; font-weight: bold; }
        .footer { margin-top: 30px; font-size: 9px; text-align: center; color: #666; border-top: 1px solid #eee; padding-top: 10px; }
        .tracking-box { background: #f0f4f8; padding: 10px; border: 1px dashed #003366; text-align: center; margin-bottom: 20px; }
        .tracking-no { font-size: 16px; font-weight: bold; color: #003366; }
    </style>
</head>
<body>

<div class="header">
    {{-- <img src="{{ public_path('logo.png') }}" class="logo" alt="Company Logo"> --}}
    <h2>BRIGO MAP LOGISTICS</h2>
    <p>Official Shipment Receipt</p>
</div>

<div class="tracking-box">
    Tracking Number: <span class="tracking-no">{{ $shipment->tracking_number }}</span><br>
    Reference No: <strong>{{ $shipment->reference_no ?? 'N/A' }}</strong>
</div>

<div class="section">
    <h4>Shipment Overview</h4>
    <table>
        <tr><th>Origin</th><td>{{ $shipment->origin }}</td></tr>
        <tr><th>Destination</th><td>{{ $shipment->destination }}</td></tr>
        <tr><th>Carrier</th><td>{{ $shipment->carrier ?? 'N/A' }}</td></tr>
        <tr><th>Shipment Mode</th><td>{{ $shipment->shipment_mode ?? 'N/A' }}</td></tr>
        <tr><th>Package Type</th><td>{{ $shipment->package_type ?? 'N/A' }}</td></tr>
        <tr><th>Current Status</th><td><strong>{{ $shipment->status }}</strong></td></tr>
    </table>
</div>

<div class="section">
    <h4>Timing Information</h4>
    <table>
        <tr><th>Departure Time</th><td>{{ $shipment->departure_time ?? 'N/A' }}</td></tr>
        <tr><th>Expected Delivery</th><td>{{ $shipment->expected_delivery_date ?? 'N/A' }}</td></tr>
        <tr><th>Pickup Date</th><td>{{ $shipment->pickup_date ?? 'N/A' }}</td></tr>
        <tr><th>Pickup Time</th><td>{{ $shipment->pickup_time ?? 'N/A' }}</td></tr>
    </table>
</div>

<div style="width: 100%; display: table;">
    <div style="display: table-row;">
        <div style="width: 50%; display: table-cell; padding-right: 10px;">
            <div class="section">
                <h4>Shipper Details</h4>
                <table>
                    <tr><th>Name</th><td>{{ $shipment->shipper_name }}</td></tr>
                    <tr><th>Company</th><td>{{ $shipment->shipper_company ?? 'N/A' }}</td></tr>
                    <tr><th>Address</th><td>{{ $shipment->shipper_address }}</td></tr>
                    <tr><th>Phone</th><td>{{ $shipment->shipper_phone ?? 'N/A' }}</td></tr>
                </table>
            </div>
        </div>
        <div style="width: 50%; display: table-cell; padding-left: 10px;">
            <div class="section">
                <h4>Receiver Details</h4>
                <table>
                    <tr><th>Name</th><td>{{ $shipment->receiver_name }}</td></tr>
                    <tr><th>Company</th><td>{{ $shipment->receiver_company ?? 'N/A' }}</td></tr>
                    <tr><th>Address</th><td>{{ $shipment->receiver_address }}</td></tr>
                    <tr><th>City/Country</th><td>{{ $shipment->receiver_city }}, {{ $shipment->receiver_country }}</td></tr>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <h4>Cargo Specifications & Payment</h4>
    <table>
        <tr>
            <th>Quantity</th><td>{{ $shipment->quantity }} {{ $shipment->piece_type }}</td>
            <th>Weight</th><td>{{ $shipment->weight }}</td>
        </tr>
        <tr>
            <th>Description</th><td colspan="3">{{ $shipment->description }}</td>
        </tr>
        <tr>
            <th>Total Freight</th><td>{{ $shipment->total_freight }}</td>
            <th>Payment Mode</th><td>{{ $shipment->payment_mode ?? 'N/A' }}</td>
        </tr>
        <tr>
            <th>Declared Value</th><td>{{ $shipment->value }}</td>
            <th>Comments</th><td>{{ $shipment->comments ?? 'None' }}</td>
        </tr>
    </table>
</div>

<div class="footer">
    <p>© {{ date('Y') }} BRIGO MAP LOGISTICS. All rights reserved.</p>
    <p>This is a computer-generated document. No signature is required.</p>
    <p>Track your shipment at: {{ config('app.url') }}</p>
</div>

</body>
</html>
