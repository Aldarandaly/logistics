<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ShowContactUsController extends Controller
{
    public function index()
    {
        $contactUs = ContactUs::all();
        return view('admin.contactUs', compact('contactUs'));
    }
    public function destroy($id)
    {
        $contactUs = ContactUs::find($id);
        $contactUs->delete();

        return redirect()->route('ShowContactUs.index')->with('success', 'Message deleted successfully');
    }
}
