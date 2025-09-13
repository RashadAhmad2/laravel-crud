<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request): RedirectResponse
    {
        $user = $request->session()->get('user');
        
        if ($user && \App\Models\User::find($user)) {
            return redirect('/landing');
        }else{
            return redirect('/login');  
        }
    }
}
