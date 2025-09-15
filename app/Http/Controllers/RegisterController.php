<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
public function ShowRegisteForm()
{
    return view('register');
}

public function register( Request $request): RedirectResponse
{
    $request->validate([
        'username' => 'required|string|unique:users,username',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed',

    ]);

    User::create([
        'username' => $request->username,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);
    return redirect('/')->with('success','Berhasil Registrasi!');
}




}

