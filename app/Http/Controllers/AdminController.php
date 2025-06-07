<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
            'email' => 'email|max:255',
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
        if (request()->has('email')){
            $user->email = $validated['email'];
        }
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function dashboardSummary()
    {
        
        $results = \DB::select("
            SELECT COUNT(*) as total, transaction_date, users.name
            FROM transactions
            JOIN users ON users.id = transactions.user_id
            where transaction_date between '".request('start_date')."' and '".request('end_date')."'
            GROUP BY transaction_date, users.name
        ");

        return response()->json($results);
    }

    public function users()
    {
        $users = User::get();
        return view('page.users.list', compact('users'));
    }
    public function userDetail($id)
    {
        $user = User::where('id', $id)->first();
        if (!$user) {
            abort(404, 'User not found');
        }
        $roles = \Spatie\Permission\Models\Role::all();
        return view('page.users.detail', compact('user','roles'));
    }
    public function updateUser(Request $request, $id)
    {
        // Validate input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $user = User::where('id', $id)->first();
        if (!$user) {
            abort(404, 'User not found');
        }

        $data = [
            'name' => $validated['name'],
            'email' => $validated['email'],
        ];

        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarName = uniqid('avatar_') . '.' . $avatar->getClientOriginalExtension();
            $avatar->move(public_path('useravatar'), $avatarName);
            $data['avatar'] = 'useravatar/' . $avatarName;
        }

        if ($request->has('role')) {
            $role = $request->input('role');
            // Validate if the role exists
            if (!\Spatie\Permission\Models\Role::where('name', $role)->exists()) {
                return redirect()->back()->withErrors(['role' => 'Selected role does not exist.']);
            }
            // Remove all current roles and assign the new one
            $user->syncRoles([$role]);
        }

        User::where('id', $id)->update($data);

        return redirect()->back()->with('success', 'User updated successfully.');
    }
    public function deleteUser($id)
    {
        $user = User::where('id', $id)->first();
        if (!$user) {
            abort(404, 'User not found');
        }

        User::where('id', $id)->delete();

        return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
    }
    public function addUser(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $data = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ];

        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarName = uniqid('avatar_') . '.' . $avatar->getClientOriginalExtension();
            $avatar->move(public_path('useravatar'), $avatarName);
            $data['avatar'] = 'useravatar/' . $avatarName;
        }

        User::insert($data);

        return redirect()->route('admin.users')->with('success', 'User added successfully.');
    }
    public function addRole(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:roles,name|max:255',
            'guard_name' => 'nullable|string|max:255',
        ]);

        $role = new \Spatie\Permission\Models\Role();
        $role->name = $validated['name'];
        $role->guard_name = $validated['guard_name'] ?? 'web';
        $role->save();

        return redirect()->back()->with('success', 'Role added successfully.');
    }

    public function listRoles()
    {
        $roles = \Spatie\Permission\Models\Role::all();
        return view('page.roles.list', compact('roles'));
    }

    public function detailRole($id)
    {
        $decoded = base64_decode($id);
        $exploded = explode('.', $decoded);
        $id = $exploded[1] ?? null;
        $role = \Spatie\Permission\Models\Role::find($id);
        if (!$role) {
            abort(404, 'Role not found');
        }
        $permissions = \Spatie\Permission\Models\Permission::all();
        return view('page.roles.detail', compact('role', 'permissions'));
    }
}
