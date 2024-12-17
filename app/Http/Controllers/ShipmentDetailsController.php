<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShipmentDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $customerId = Auth::id();

        if ($customerId) {
            // Fetch shipments related to the logged-in customer
            $shipments = Shipment::where('customer_id', $customerId)->get();
            return view('customer.shipmentDetails', compact('shipments'));
        }
    }
}
