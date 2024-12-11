<?php

namespace App\Http\Controllers;

use App\Events\AdminActivityEvent;
use App\Models\Payment;
use App\Models\Shipment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::all();
        return view('admin.PaymentCrud.list', compact('payments'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $shipments = Shipment::all();
        return view('admin.PaymentCrud.create', compact('shipments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'shipment_id' => 'required|numeric',
            'amount' => 'required|numeric',
            'status' => 'required',
        ]);

        $payment = Payment::create($validated);
        event(new AdminActivityEvent('Payment created successfully!'));
        return redirect()->route('payments.index')->with('success', 'Payments created successfully');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $payment = Payment::find($id);

        if (!$payment) {
            return redirect()->route('payments.index')->with('error', 'Payment not found.');
        }

        $shipments = Shipment::all();

        return view('admin.PaymentCrud.update', compact('payment', 'shipments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'shipment_id' => 'required|numeric|exists:shipments,id|unique:payments,shipment_id,' . $id,
            'amount' => 'required|numeric',
            'status' => 'required',
        ]);

        $payment = Payment::find($id);

        if (!$payment) {
            return redirect()->route('payments.index')->with('error', 'Payment not found.');
        }

        $payment->update($validated);

        return redirect()->route('payments.index')->with('success', 'Payment updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $payment = Payment::find($id);
        $payment->delete();
        return redirect()->route('payments.index')->with('success', 'Payments deleted successfully');
    }
}
