<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register',[
            'app' => 'OnlineStore',
            'page' => 'Registration'
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:50|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:50|confirmed'
        ]);

        $validateData['password'] = bcrypt($validateData['password']);

        User::create($validateData);

        $request->session()->flash('success', 'Registration success! Please login.');

        return redirect()->intended('/login');
    }
}
