<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'shipment_number',
        'tracking_number',
        'status',
        'shipment_date',
        'delivery_date',
        'cost',
        'payment_status',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
