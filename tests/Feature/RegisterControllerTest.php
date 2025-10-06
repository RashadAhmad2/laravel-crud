<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterControllerTest extends TestCase
{
    
    public function viewRegis()
    {
        $this->get('/')
         ->assertRedirect('/register');
    }
    public function testregis()
    {
         $this->post('/register', [
            'username' => 'Yusuf',
            'email' => 'yusu2asfaf@gmail.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ])->assertRedirect('/login');
    }


    }
