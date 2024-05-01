<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;
use App\Models\Admin;
use App\Models\User;
use App\Mail\AdminMail;

class MailTest extends TestCase
{
    use RefreshDatabase;

    protected $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(\Database\Seeders\AdminsTableSeeder::class);
        $this->admin = Admin::first();
    }

    public function test_mail_form()
    {
        $this->actingAs($this->admin, 'admin');

        $response = $this->get('/admin/mail');

        $response->assertStatus(200);
        $this->assertAuthenticatedAs($this->admin, 'admin');
    }

    public function test_send_mail()
    {
        $this->actingAs($this->admin, 'admin');

        User::factory()->create();

        Mail::fake();
        $data = [
            'mail_subject' => 'テストメール',
            'mail_message' => 'これはテストメールです。',
        ];

        $response = $this->post('/admin/mail', $data);

        $response->assertRedirect('/admin/mail');
        $response->assertStatus(302);

        $this->assertAuthenticatedAs($this->admin, 'admin');

        Mail::assertSent(AdminMail::class);
    }
}
