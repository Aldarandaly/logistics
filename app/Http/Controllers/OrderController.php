<?php

namespace App\Http\Controllers;

use App\Events\AdminActivityEvent;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return view('admin.OrderCrud.list', compact('orders'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.OrderCrud.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_number' => 'required|numeric|unique:orders,order_number',
            'customer_name' => 'required|string',
            'status' => 'required',
            'total_amount' => 'required|numeric',
        ]);

        $orders = Order::create($validated);
        event(new AdminActivityEvent('Order created successfully!'));
        return redirect()->route('orders.index')->with('success', 'Order created successfully');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $orders = Order::find($id);
        return view('admin.OrderCrud.update', compact('orders'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'order_number' => 'required|numeric|unique:orders,order_number,' . $id,
            'customer_name' => 'required|string',
            'status' => 'required',
            'total_amount' => 'required|numeric',
        ]);

        $order = Order::find($id);
        $order->update($validated);
        return redirect()->route('orders.index')->with('success', 'Order updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $orders = Order::find($id);
        $orders->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully');
    }
}
