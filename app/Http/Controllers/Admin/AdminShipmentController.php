<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shipment;
use Illuminate\Http\Request;

class AdminShipmentController extends Controller
{
    //



      public function bookcargo()
    {
        $shipments = Shipment::latest()->paginate(20);
        return view('admin.shipments.book', compact('shipments'));
    }


      /**
     * View all shipments
     */
    public function index(Request $request)
    {
        $query = Shipment::query();

        if ($request->filled('tracking_number')) {
            $query->where('tracking_number', 'LIKE', '%' . $request->tracking_number . '%');
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $shipments = $query->latest()->paginate(20);
        return view('admin.shipments.index', compact('shipments'));
    }

    /**
     * View single shipment
     */
    public function show(Shipment $shipment)
    {
        return view('admin.shipments.show', compact('shipment'));
    }

    /**
     * Update shipment status
     */
    public function updateStatus(Request $request, Shipment $shipment)
    {
        $request->validate([
            'status' => 'required|string',
        ]);

        $shipment->update([
            'status' => $request->status,
        ]);

        return back()->with('success', 'Shipment status updated successfully.');
    }

}
