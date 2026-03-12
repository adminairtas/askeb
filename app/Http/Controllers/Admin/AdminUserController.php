<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        return redirect()->route('admin.users.index')
            ->with('success','User berhasil dibuat');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request,$id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'role'=>$request->role
        ]);

        return redirect()->route('admin.users.index');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return back();
    }
}