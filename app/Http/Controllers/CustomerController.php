<?php

namespace App\Http\Controllers;

use App\Events\AdminActivityEvent;
use App\Models\Customer;
use App\Models\Shipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();
        return view('admin.CustomerCrud.list', compact('customers'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.CustomerCrud.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|',
            'email' => 'required|email',
            // 'password' => 'required',
            // 'role' => 'required',
            'phone' => 'required|numeric',
            'address' => 'required|string',
        ]);

        // $validated['password'] = Hash::make($validated['password']);
        $customers = Customer::create($validated);

        event(new AdminActivityEvent('Customer created successfully!'));
        return redirect()->route('customers.index')->with('success', 'Customer created successfully');
    }

    public function show(string $id)
    {
        $customer = Customer::findOrFail($id);
        $shipment = $customer->shipments()->first();

        return view('admin.CustomerCrud.view', compact('customer', 'shipment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customers = Customer::find($id);
        return view('admin.CustomerCrud.update', compact('customers'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|',
            'email' => 'required|email',
            // 'password' => 'required',
            // 'role' => 'required',
            'phone' => 'required|numeric',
            'address' => 'required|string',
        ]);

        // $validated['password'] = Hash::make($validated['password']);

        $customers = Customer::find($id);
        $customers->update($validated);
        return redirect()->route('customers.index')->with('success', 'Customer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customers = Customer::find($id);

        if ($customers) {
            $customers->delete();
            return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
        } else {
            return redirect()->route('customers.index')->with('error', 'Shipment not found.');
        }
    }
}
