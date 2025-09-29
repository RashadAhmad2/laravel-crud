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

        if ($this->userService->login($user, $pass)) {
            $userModel = \App\Models\User::where('username', $user)->first();

            if ($userModel) {
                Auth::login($userModel, true); // true = remember me
                return redirect('/landing');
            }
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

        return redirect('/login');
    }
}
