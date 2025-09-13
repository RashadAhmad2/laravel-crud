<?php

namespace App\Http\Controllers;

use App\Service\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
        ->view('user.login',['title' => 'login']);
    }
    public function DoLogin(Request $request) : Response|RedirectResponse
    {
        $user = $request->input('username');
        $pass = $request->input('password');

        if (empty($user) || empty($pass)) {
            return response()
            ->view('userlogin',[
                'title' => 'login',
                'error' => 'Username / Passoword is Required'
            ]);
        }
        if ($this->userService->login($user, $pass)) {
            $request->session()->put('user',$user);
            return redirect('/');
        }
        return response()
        ->view('user.login',[
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
        $request->session()->invalidate();

        // fungsinya regenerasi CSRF Token biar gk reuse session lama
        $request->session()->regenerateToken();

        return redirect('/');

    }
}
