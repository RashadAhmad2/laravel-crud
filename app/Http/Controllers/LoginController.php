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

    // Login
    public function login(): Response
    {
        return response()
        ->view('login',['title' => 'login']);
    }
    public function DoLogin(Request $request) : Response|RedirectResponse
    {
        $user = $request->input('username');
        $pass = $request->input('password');

        if (empty($user) || empty($pass)) {
            return response()
            ->view('login',[
                'title' => 'login',
                'error' => 'Username / Passoword is Required'
            ]);
        }
        if ($this->userService->login($user, $pass)) {
            $userModel = \App\Models\User::where('username', $user)->first();

            if ($userModel) {
                Auth::login($userModel, true); // <- true supaya remember
                return redirect('/landing');
            }
}
        
        return response()
        ->view('login',[
            'title' => 'login',
            'error' => 'Username / Password is wrong'
        ]);
    }
    public function doLogout(Request $request): RedirectResponse
    {
        // $request->session()->forget('user');
        // return redirect('/'); -> kalo sesuai tutor

        // kalo sesuai laravel

        // fungsinya menghapus semua data session
        // $request->session()->invalidate();

        // // fungsinya regenerasi CSRF Token biar gk reuse session lama
        // $request->session()->regenerateToken();
        Auth::logout();

        return redirect('/');

    }
}
