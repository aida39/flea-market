<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class UserTest extends TestCase
{
    use RefreshDatabase;

    protected $user;
    protected $profile;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();

        $this->profile = Profile::create([
            'user_id' => $this->user->id,
            'name' => 'John',
            'postal_code' => '1234567',
            'address' => '東京都千代田区1-1',
            'image_path' => '/images/profile_01.jpeg',
        ]);
    }

    public function test_mypage()
    {
        $this->actingAs($this->user);

        $response = $this->get('/mypage');

        $response->assertStatus(200);

        $this->assertAuthenticatedAs($this->user, 'web');
    }

    public function test_profile_form()
    {
        $this->actingAs($this->user);

        $response = $this->get('/mypage/profile');

        $response->assertStatus(200)
            ->assertViewHas('profile', $this->profile);
        $this->assertAuthenticatedAs($this->user, 'web');
    }

    public function test_update_or_create_profile()
    {
        $this->actingAs($this->user);

        Storage::fake('public');
        $file = UploadedFile::fake()->image('profile.jpg');

        $request_data =  [
            'name' => 'Updated Name',
            'postal_code' => '1234567',
            'address' => 'Updated Address',
            'building' => 'Updated Building',
            'image' => $file,
        ];

        $response = $this->post('/mypage/profile', $request_data);

        $response->assertRedirect('/mypage');

        $this->assertDatabaseHas('profiles', [
            'user_id' => $this->user->id,
            'name' => 'Updated Name',
            'postal_code' => '1234567',
            'address' => 'Updated Address',
            'building' => 'Updated Building',
        ]);

        $this->assertArrayHasKey('image', $request_data);

        $this->assertAuthenticatedAs($this->user, 'web');
    }
}
