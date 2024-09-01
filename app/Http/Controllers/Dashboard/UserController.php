<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('pages.dashboard.user.index', compact('users'));
    }

    public function create(){
        return view('pages.dashboard.user.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        return redirect()->route('dashboard.user.index')->with('status', 'Berhasil menambahkan user');
    }

    public function edit($id){
        $user = User::find($id);
        return view('pages.dashboard.user.edit', compact('user'));
    }

    public function update(Request $request, User $user){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'password' => ['nullable'],
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'role' => $request->role ?? $user->role
        ]);

        return redirect()->route('dashboard.user.index')->with('status', 'Berhasil Update user');
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->route('dashboard.user.index')->with('status', 'Berhasil menghapus user');
    }
}
