<?php

namespace App\Http\Controllers;

use App\Service\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
        $this->middleware('guest')->except('doLogout');
    }

    // tampilkan form login
    public function login(): Response
    {
        return response()->view('user.login', [
            'title' => 'Login'
        ]);
    }

    // proses login
    public function doLogin(Request $request): Response|RedirectResponse
    {
        $user = $request->input('username');
        $pass = $request->input('password');

        if (empty($user) || empty($pass)) {
            return response()->view('user.login', [
                'title' => 'Login',
                'error' => 'Username / Password is required'
            ]);
        }

           // check user
         $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('landing');
        }

        return response()->view('user.login', [
            'title' => 'Login',
            'error' => 'Username / Password is wrong'
        ]);
    }

    // logout
    public function doLogout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

    return redirect('/login')->with('success', 'Berhasil logout');

    }
}
