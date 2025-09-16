<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeTest extends TestCase
{
    public function testGuest()
    {
        $this->get('/')
        ->assertRedirect('/login');
    }
   
    public function testDoLogin()
{
    $user = User::factory()->create([
        'username' => 'Rashad',
        'password' => bcrypt('password123'),
    ]);

    $this->actingAs($user)
        ->get('/')
        ->assertRedirect('/landing');
}

}
