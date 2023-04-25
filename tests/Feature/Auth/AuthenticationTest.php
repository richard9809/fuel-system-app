<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_screen_can_be_rendered()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_unauthenticated_user_cannot_access_home()
    {
        $response = $this->get('dashboard');

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function test_users_can_authenticate_using_the_login_screen()
    {
        $user = User::factory()->create([
            'role' => 'system admin',
            'password' => 'password123',
            'dob' => '1980-03-01',
        ]);

        $response = $this->post('/', [
            'email' => $user->email,
            'password' => 'password123',
        ]);

        $this->assertAuthenticated();
        $response->assertStatus(302);
        $response->assertRedirect('dashboard');
    }

    public function test_users_can_not_authenticate_with_invalid_password()
    {
        $user = User::factory()->create([
            'role' => 'driver',
            'dob' => '1980-03-01',
        ]);

        $this->post('/', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }

}
