<?php

namespace App\Http\Controllers;

use App\Events\AdminActivityEvent;
use App\Models\Customer;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reports = Report::all();
        return view('admin.ReportCrud.list', compact('reports'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::all();
        return view('admin.ReportCrud.create', compact('customers'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required|numeric',
            'report_type' => 'required',
            'details' => 'required',
        ]);

        $report = Report::create($validated);
        event(new AdminActivityEvent('Report created successfully!'));
        return redirect()->route('reports.index')->with('success', 'Report created successfully');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $report = Report::find($id);
        $customers = Customer::all();
        return view('admin.ReportCrud.update', compact('report','customers'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'customer_id' => 'required|numeric|exists:customers,id|unique:reports,customer_id,' . $id,
            'report_type' => 'required',
            'details' => 'required',
        ]);

        $report = Report::find($id);
        $report->update($validated);
        return redirect()->route('reports.index')->with('success', 'Report updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $report = Report::find($id);
        $report->delete();
        return redirect()->route('reports.index')->with('success', 'Report deleted successfully');
    }
}
