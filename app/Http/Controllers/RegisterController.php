<?php 

namespace App\Http\Controllers;

use App\Models\User;
use App\Service\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('user.register');
    }

    // private UserService $userService;

    // public function __construct(UserService $userService)
    // {
    //     $this->userService = $userService;
    // }  

    public function doRegister(Request $request): RedirectResponse
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string|unique:users,username',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ], [
            'username.required' => 'Username wajib diisi.',
            'email.required'    => 'Email wajib diisi.',
            'email.email'       => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
            'password.min'      => 'Password minimal 6 karakter.',
            'password.confirmed'=> 'Konfirmasi password tidak sama.',
        ]);

        // Simpan user baru 
        $data = $request->except('password_confirmation');
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);

        // Opsional: auto login
        
        Auth::login($user);

        // Redirect dengan flash message
        return redirect('/login')->with('success', 'Registrasi berhasil, silakan login!');
    }
}
