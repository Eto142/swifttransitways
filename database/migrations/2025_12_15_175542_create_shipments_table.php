<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');

            // AWB & Tracking
            $table->string('tracking_number')->unique();
            $table->string('reference_no')->nullable();

            // Routing
            $table->string('origin');
            $table->string('destination');
            $table->date('shipment_date')->nullable();

            // Shipment info
            $table->string('carrier')->nullable();
            $table->string('shipment_mode')->nullable();
            $table->string('shipment_type')->nullable();
            $table->string('package_type')->nullable();
            $table->string('product')->nullable();
            $table->string('payment_mode')->nullable();
            $table->string('total_freight')->nullable();
            $table->string('value')->nullable();
            $table->string('currency', 3)->default('USD');

            // Timing
            $table->string('departure_time')->nullable();
            $table->string('expected_delivery_date')->nullable();
            $table->string('pickup_date')->nullable();
            $table->string('pickup_time')->nullable();

            // Shipper (Sender)
            $table->string('shipper_name');
            $table->string('shipper_company')->nullable();
            $table->text('shipper_address');
            $table->string('shipper_city')->nullable();
            $table->string('shipper_country')->nullable();
            $table->string('shipper_phone')->nullable();
            $table->string('shipper_postal_code')->nullable();

            // Receiver
            $table->string('receiver_name');
            $table->string('receiver_company')->nullable();
            $table->text('receiver_address');
            $table->string('receiver_city')->nullable();
            $table->string('receiver_country')->nullable();

            // Cargo / Specs
            $table->integer('quantity')->nullable();
            $table->string('piece_type')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->text('description')->nullable();
            $table->text('comments')->nullable();
            $table->string('image')->nullable();

            // Tracking Status
            $table->string('status')->default('Order Received');

            $table->timestamps();

            // Indexes
            $table->index('tracking_number');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
