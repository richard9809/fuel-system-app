<?php

namespace Tests\Feature\Auth;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_addUser_screen_can_be_rendered()
    {
        $response = $this->get('addUser');

        $response->assertStatus(302);
    }

    public function test_new_users_can_register()
    {
        $response = $this->post('addUser', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'role' => 'admin',
            'dob' => 1999-05-28,
        ]);

        $response->assertStatus(405);
        $response->assertRedirect('users');
    }
}
