<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('page.dashboard');
    }

    public function profile()
    {
        return view('page.profile');
    }
    public function updateProfile(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);
        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarName = uniqid('avatar_') . '.' . $avatar->getClientOriginalExtension();
            $avatar->move(public_path('useravatar'), $avatarName);
            $validated['avatar'] = 'useravatar/' . $avatarName;
        }

        // Update avatar path if uploaded
        if (isset($validated['avatar'])) {
            $user = auth()->user();
            $user->avatar = $validated['avatar'];
        }
        // Update user profile
        $user = auth()->user();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
