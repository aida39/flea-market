<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Item;
use App\Models\User;
use App\Models\Comment;
use App\Models\Favorite;

class ItemTest extends TestCase
{
    use RefreshDatabase;

    protected $user;
    protected $items;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->actingAs($this->user);

        $this->seed(\Database\Seeders\ConditionsTableSeeder::class);
        $this->items = Item::factory(3)->create();
    }

    public function test_index_page()
    {
        $response = $this->get("/");

        $response->assertStatus(200)
            ->assertViewHas('items', $this->items);
    }

    public function test_detail_page()
    {
        $item = $this->items->first();

        $comment_count = rand(0, 3);
        $favorite_count = rand(0, 3);

        Comment::factory($comment_count)->create(['item_id' => $item->id]);
        Favorite::factory($favorite_count)->create(['item_id' => $item->id]);

        $response = $this->get("/item/{$item->id}");

        $response->assertStatus(200)
            ->assertViewHas('item', $item);

        $response->assertViewHasAll([
            'comment_count' => $comment_count,
            'favorite_count' => $favorite_count,
        ]);

    }
}
