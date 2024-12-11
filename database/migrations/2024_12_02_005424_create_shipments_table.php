<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained()->onDelete('cascade');
            $table->string('shipment_number')->unique();
            $table->string('tracking_number')->unique();
            $table->enum('status', ['new', 'in_transit', 'delivered'])->default('in_transit');
            $table->date('shipment_date');
            $table->date('delivery_date');
            $table->integer('cost');
            $table->enum('payment_status', ['paid', 'unpaid', 'partial']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
