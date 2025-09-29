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
         ->assertRedirect('/regis');
    }
    public function testregis()
    {
         $this->post('/regis', [
            'username' => 'Yusuf',
            'email' => 'yusu2asfaf@gmail.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ])->assertRedirect('/login');

        $this->assertDatabaseHas('users', [
            'username' => 'Yusuf',
            'email' => 'yusu2asfaf@gmail.com',
        ]);
    }


    }
