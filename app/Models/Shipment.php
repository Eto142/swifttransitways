<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;

    /**
     * Mass assignable fields
     */
    protected $fillable = [
        'user_id',
        'tracking_number',
        'reference_no',
        'origin',
        'destination',
        'shipment_date',
        'carrier',
        'shipment_mode',
        'product',
        'payment_mode',
        'total_freight',
        'value',
        'currency',
        'departure_time',
        'expected_delivery_date',
        'pickup_date',
        'pickup_time',
        'shipper_name',
        'shipper_company',
        'shipper_address',
        'shipper_city',
        'shipper_country',
        'shipper_phone',
        'shipper_postal_code',
        'receiver_name',
        'receiver_company',
        'receiver_address',
        'receiver_city',
        'receiver_country',
        'quantity',
        'weight',
        'description',
        'comments',
        'image',
        'status',
    ];

    /**
     * Default attributes
     */
    protected $attributes = [
        'status' => 'Order Received',
    ];

    /**
     * Casts
     */
    protected $casts = [
        'shipment_date' => 'date',
    ];

    /**
     * Hide internal IDs
     */
    protected $hidden = [
        'id',
    ];

    public function histories()
{
    return $this->hasMany(ShipmentHistory::class)->orderBy('date', 'desc')->orderBy('time', 'desc');
}

public function history()
    {
        return $this->hasMany(ShipmentHistory::class, 'shipment_id');
    }

}
