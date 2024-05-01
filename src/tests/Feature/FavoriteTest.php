<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Item;
use App\Models\User;

class FavoriteTest extends TestCase
{
    use RefreshDatabase;

    protected $user;
    protected $item;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->actingAs($this->user);

        $this->seed(\Database\Seeders\ConditionsTableSeeder::class);
        $this->item = Item::factory()->create();
    }

    public function test_store_favorite()
    {
        $response = $this->patch("/favorite/{$this->item->id}");

        $this->assertTrue($this->item->fresh()->favorite()->where('user_id', $this->user->id)->exists());
        $this->assertAuthenticatedAs($this->user, 'web');
    }

    public function test_delete_favorite()
    {
        $this->item->favorite()->create(['user_id' => $this->user->id]);

        $response = $this->patch("/favorite/{$this->item->id}");

        $this->assertFalse($this->item->fresh()->favorite()->where('user_id', $this->user->id)->exists());
        $this->assertAuthenticatedAs($this->user, 'web');
    }
}
