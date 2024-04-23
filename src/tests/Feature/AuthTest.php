<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_register_page()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_user_registration()
    {
        $user_data = [
            'email' => 'test@example.com',
            'password' => 'test12345'
        ];
        $response = $this->post('/register', $user_data);

        $response->assertRedirect('/login');
        $this->assertDatabaseHas('users', ['email' => $user_data['email']]);
    }

    public function test_login_page()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_user_login()
    {

        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => Hash::make('test12345'),
        ]);

        $login_data = [
            'email' => 'test@example.com',
            'password' => 'test12345',
        ];
        $response = $this->post('/login', $login_data);

        $response->assertRedirect('/');
        $this->assertAuthenticatedAs($user, 'web');
    }

    public function test_user_logout()
    {
        $user = User::factory()->create();

        $this->actingAs($user, 'web');
        $response = $this->get('/logout');

        $response->assertRedirect('/');
        $this->assertGuest();
    }
}
