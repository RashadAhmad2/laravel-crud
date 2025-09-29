<?php 

namespace App\Service;

interface UserService
{
    function login(string $username, string $password): bool;
}
