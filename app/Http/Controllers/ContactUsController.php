<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{

    public function index()
    {
        return view('customer.contactUs');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        ContactUs::create($validated);
        return redirect()->route('home.index')->with('success', 'Your message has been sent successfully.');
    }
}
