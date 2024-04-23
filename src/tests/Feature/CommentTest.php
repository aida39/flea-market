<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use App\Models\Comment;
use App\Models\Item;
use App\Models\User;

class CommentTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(\Database\Seeders\UsersTableSeeder::class);

        // $user = User::first();
        $user = User::factory()->create();
        $this->actingAs($user);

        $this->seed(\Database\Seeders\ConditionsTableSeeder::class);

    }

    public function test_comment_page()
    {
        $item = Item::factory()->create();
        $comments = Comment::factory(3)->create(['item_id' => $item->id]);

        $response = $this->get("/comment/{$item->id}");

        $response->assertStatus(200)
            ->assertViewHas('comments', $comments);
    }

    public function test_store_comment()
    {
        $user = User::first();
        $item = Item::factory()->create(['user_id' => $user->id, 'condition_id' => '1']);
        $comment_data = ['comment' => 'テストコメント'];

        $response = $this->post("/comment/{$item->id}", $comment_data);

        $this->assertDatabaseHas('comments', [
            'comment' => 'テストコメント',
            'user_id' => $user->id,
            'item_id' => $item->id,
        ]);
        $response->assertRedirect("/comment/{$item->id}");
    }

    public function test_delete_comment()
    {
        $item = Item::factory()->create();
        $comment = Comment::factory()->create(['item_id' => $item->id]);

        $response = $this->post("/comment/delete/{$comment->item_id}", ['comment_id' => $comment->id]);

        $this->assertSoftDeleted('comments', ['id' => $comment->id]);
        $response->assertRedirect();
    }
}
