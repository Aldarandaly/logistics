<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('customer.track');
    }
    public function track(Request $request)
    {
        $shipment = Shipment::where('shipment_number', $request->shipment_number)->first();

        if ($shipment) {
            return view('customer.track', ['shipment' => $shipment]);
        } else {
            return redirect()->back()->with('error', 'Shipment not found.');
        }
    }
}
