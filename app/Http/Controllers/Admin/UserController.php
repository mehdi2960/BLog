<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $users=User::all();
       return view('dashboard.users.all',compact('users'));
    }


    public function create()
    {
        return view('dashboard.users.create');

    }

    public function store(Request $request)
    {
       $request->validate([
           'name'=>'required|string',
           'email'=>'required|unique:users,email|string',
           'password'=>'required|string|min:8|confirmed',
       ]);

        $request['password']=Hash::make($request['password']);
        User::create($request->all());

        return back();
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
