<?php

namespace App\Http\Controllers;

use App\Events\AdminActivityEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{

    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {


        Log::info('Request Token:', $request->input('_token'));
        Log::info('Session Token:', session()->token());
        $credentials = $request->only('email', 'password');

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required'
        ]);


        if (Auth::guard('web')->attempt($credentials)) {

            $user = Auth::guard('web')->user();
            Log::info("User Role: " . $user->role);

            if ($user->role === 'admin') {
                event(new AdminActivityEvent('Admin has logged in successfully!'));
            } elseif ($user->role === 'editor') {
                event(new AdminActivityEvent('Editor has logged in successfully!'));
            }


            return redirect()->route('dashboard');
            return redirect()->route('login')->withErrors(['access' => 'Access denied for your role.']);
        }


        if (Auth::guard('customer')->attempt($credentials)) {
            return redirect()->route('home');
        }

        // Invalid credentials
        return back()->withErrors(['login' => 'Invalid credentials.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
