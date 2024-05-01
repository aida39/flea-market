<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Admin;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    protected $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(\Database\Seeders\AdminsTableSeeder::class);
        $this->admin = Admin::first();
    }

    public function test_login_page()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_admin_login()
    {
        $login_data = [
            'email' => 'admin@example.com',
            'password' => 'coachtech',
        ];
        $response = $this->post('/admin/login', $login_data);

        $response->assertRedirect('/admin/index');
        $this->assertAuthenticatedAs($this->admin, 'admin');
        $response->assertStatus(302);
    }

    public function test_admin_logout()
    {
        $this->actingAs($this->admin, 'admin');
        $response = $this->get('/admin/logout');

        $response->assertRedirect('/admin/login');
        $this->assertGuest();
        $response->assertStatus(302);
    }
}
