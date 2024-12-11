<?php

namespace App\Http\Controllers;

use App\Models\UserActivity;
use Illuminate\Http\Request;

class AdminActivityController extends Controller
{
    public function index()
    {
        $activities = UserActivity::latest()->get();

        return view('admin.activity', compact('activities'));
    }
    public function destroy($id)
    {
        $activity = UserActivity::findOrFail($id);
        $activity->delete();
        return redirect()->route('activities.index')->with('success', 'User activity deleted successfully');
    }
}
