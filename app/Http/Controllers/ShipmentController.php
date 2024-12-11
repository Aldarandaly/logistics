<?php

namespace App\Http\Controllers;

use App\Events\AdminActivityEvent;
use App\Events\UserActivity;
use App\Mail\ShipmentDelivered;
use App\Models\Customer;
use App\Models\Shipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ShipmentController extends Controller
{
    public function send($id)
    {
        $shipment = Shipment::findOrFail($id);
        $customer = $shipment->customer;

        if ($shipment->status === 'delivered') {
            Mail::to($customer->email)->send(new ShipmentDelivered($customer, $shipment));
        }

        // $shipment->status = 'delivered';
        // $shipment->delivery_date = now();
        // $shipment->save();


        // if ($customer && $customer->email) {
        //     Mail::to($customer->email)->send(new ShipmentDelivered($customer, $shipment));

        //     if (Mail::failures()) {
        //         return response()->json(['error' => 'Failed to send email.'], 500);
        //     }
        // }

        // return response()->json(['message' => 'Shipment marked as delivered and email sent successfully.']);
    }



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shipments = Shipment::all();
        return view('admin.ShipmentCrud.list', compact('shipments'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::all();
        return view('admin.ShipmentCrud.create', compact('customers'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'customer_id' => 'required',
            'shipment_number' => 'required|numeric|unique:shipments,shipment_number',
            'tracking_number' => 'required|numeric',
            'status' => 'required',
            'shipment_date' => 'required|date',
            'delivery_date' => 'required|date',
            'cost' => 'required',
            'payment_status' => 'required',
        ]);

        $shipment = Shipment::create($validated);
        event(new AdminActivityEvent('Shipment created successfully!'));
        return redirect()->route('shipments.index')->with('success', 'Shipment created successfully');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $shipment = Shipment::find($id);
        $customers = Customer::all();
        return view('admin.ShipmentCrud.update', compact('shipment', 'customers'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'customer_id' => 'required',
            'shipment_number' => 'required|numeric|unique:shipments,shipment_number,' . $id,
            'tracking_number' => 'required|numeric',
            'status' => 'required',
            'shipment_date' => 'required|date',
            'delivery_date' => 'required|date',
            'cost' => 'required',
            'payment_status' => 'required',
        ]);

        $shipment = Shipment::find($id);
        $shipment->update($validated);
        return redirect()->route('shipments.index')->with('success', 'Shipment updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $shipment = Shipment::find($id);
        $shipment->delete();
        return redirect()->route('shipments.index')->with('success', 'Shipment deleted successfully');
    }
}
