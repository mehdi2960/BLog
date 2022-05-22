<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:users,user')->only(['index']);
    }

    public function index()
    {
        $users = User::all();
        return view('dashboard.users.all', compact('users'));
    }


    public function create()
    {
        return view('dashboard.users.create');

    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|unique:users,email|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $request['password'] = Hash::make($request['password']);
        User::create($request->all());

        return back();
    }


    public function show($id)
    {
        //
    }

    public function edit(User $user)
    {
        return view('dashboard.users.edit', compact('user'));
    }


    public function update(Request $request, User $user)
    {
        $date = $request->validate([
            'name' => 'required|string',
            'email' => 'required|unique:users,email|string',
        ]);

        if ($request['password']) {
            $request->validate([
                'password' => ['required', 'string', 'min:8', 'confirmed']
            ]);
            $date['password'] = Hash::make($request['password']);
        }

        $user->update($date);

        return back();
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back();
    }

    public function editRole(User $user)
    {
        $roles = Role::all();
        return view('dashboard.users.role', compact('user', 'roles'));
    }

    public function updatetRole(User $user,Request $request)
    {
        $user->roles()->sync($request->role);
        return redirect(route('users.index'));
    }
}
