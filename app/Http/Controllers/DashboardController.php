<?php

namespace App\Http\Controllers;

use App\Models\{Customer, Driver, Order, Payment, Report, Shipment, User, Vehicle};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {

        $totalCost = DB::table('shipments')
            ->where('payment_status', 'paid')
            ->sum('cost');

        $unpaidCost = DB::table('shipments')
            ->where('payment_status', 'unpaid')
            ->sum('cost');

        $data = [
            'orders' => Order::count(),
            'shipments' => Shipment::count(),
            'users' => User::count(),
            'customers' => Customer::count(),
            'payments' => Payment::count(),
            'reports' => Report::count(),
            'totalCost' => $totalCost,
            'unpaidCost' => $unpaidCost,
        ];

        return view('admin.dashboard', $data);
    }
}
