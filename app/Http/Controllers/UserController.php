<?php

namespace App\Http\Controllers;

use App\Events\AdminActivityEvent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.UserCrud.list', compact('users'));
    }

    public function create()
    {
        return view('admin.UserCrud.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'role' => 'required',
        ]);

        $validated['password'] = bcrypt($validated['password']);
        User::create($validated);
        event(new AdminActivityEvent('User created successfully!'));
        return redirect()->route('users.index')->with('success', 'User created successfully');
    }
    public function show()
    {
        $activities = DB::table('user_activities')
            ->where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();
        return view('admin.UserCrud.view', compact('activities'));
    }
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.UserCrud.update', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:8',
            'role' => 'required',
        ]);

        $user = User::findOrFail($id);
        if ($request->filled('password')) {
            $validated['password'] = bcrypt($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}
