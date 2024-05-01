<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use App\Models\Comment;
use App\Models\Condition;
use App\Models\Item;
use App\Models\User;

class CommentTest extends TestCase
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

    public function test_comment_page()
    {
        $comments = Comment::factory(3)->create(['item_id' => $this->item->id]);

        $response = $this->get("/comment/{$this->item->id}");

        $response->assertStatus(200)
            ->assertViewHas('comments', $comments);
    }

    public function test_store_comment()
    {
        $comment_data = ['comment' => 'テストコメント'];

        $response = $this->post("/comment/{$this->item->id}", $comment_data);

        $this->assertDatabaseHas('comments', [
            'comment' => 'テストコメント',
            'user_id' => $this->user->id,
            'item_id' => $this->item->id,
        ]);
        $response->assertRedirect("/comment/{$this->item->id}");
        $this->assertAuthenticatedAs($this->user, 'web');
    }

    public function test_delete_comment()
    {
        $comment = Comment::factory()->create();

        $response = $this->post("/comment/delete/{$comment->item_id}", ['comment_id' => $comment->id]);

        $this->assertModelMissing($comment);
        $response->assertRedirect();
        $this->assertAuthenticatedAs($this->user, 'web');
    }
}
