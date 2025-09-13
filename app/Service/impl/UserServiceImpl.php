<?php
 namespace App\Service\impl;

 use App\Service\UserService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserServiceImpl implements UserService
{
    public function login(string $username, string $password): bool
    {
        $user = DB::table('users')
        ->where('email')
        ->first();

        if(!user){
            return false;
        }
        return Hash::check($password, $user->$password);
    }
}