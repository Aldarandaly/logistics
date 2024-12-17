<?php

namespace App\Http\Controllers;

use App\Events\AdminActivityEvent;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        // Attempt to authenticate the User model (default 'web' guard)
        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::guard('web')->user();
            // Redirect based on user role
            if ($user->role === 'admin' || $user->role === 'editor') {
                event(new AdminActivityEvent("{$user->role} has logged in successfully!"));
                return redirect()->route('dashboard');
            }
            // Logout if role is unauthorized
            Auth::guard('web')->logout();
            return redirect()->route('login')->withErrors(['access' => 'Access denied for your role.']);
        }
        // Attempt to authenticate the Customer model (custom 'customer' guard)
        if (Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $customer = Auth::guard('customer')->user();
            // Redirect based on Customer role
            if ($customer->role === 'customer') {
                return redirect()->route('home.index');
            }
            // Logout if role is unauthorized
            Auth::guard('customer')->logout();
            return redirect()->route('login')->withErrors(['access' => 'Access denied for your role.']);
        }
        // If login fails for both User and Customer
        return redirect()->route('login')->withErrors(['credentials' => 'Invalid login credentials.']);
    }



    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
