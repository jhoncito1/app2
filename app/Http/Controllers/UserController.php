<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        return view('users.index', [
            'users' => $users
        ]);
    }

    public function store(Request $request)
    {

      $request->validate([
        'doc'      => 'required',
        'name'      => 'required',
        'status'      => 'required',
        'car'      => 'required',
        'email'     => ['email', 'unique:users'],
        'password'  => ['min:8'],
      ]);

      User::create([
          'doc' => $request->doc,
          'name' => $request->name,
          'status' => $request->status,
          'car' => $request->car,
          'email' => $request->email,
          'password' => bcrypt($request->password),
      ]);

      return back();
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back();
    }
}
