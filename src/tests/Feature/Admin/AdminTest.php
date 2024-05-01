<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Item;
use App\Models\User;
use App\Models\Comment;
use App\Models\Admin;

class AdminTest extends TestCase
{
    use RefreshDatabase;

    protected $user;
    protected $items;
    protected $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();

        $this->seed(\Database\Seeders\ConditionsTableSeeder::class);
        $this->seed(\Database\Seeders\CategoriesTableSeeder::class);
        $this->items = Item::factory(3)->create();

        $this->seed(\Database\Seeders\AdminsTableSeeder::class);
        $this->admin = Admin::first();
    }

    public function test_index_page()
    {
        $this->actingAs($this->admin, 'admin');

        $response = $this->get("/admin/index");

        $response->assertStatus(200)
            ->assertViewHas('items', $this->items);

        $this->assertAuthenticatedAs($this->admin, 'admin');
    }

    public function test_delete_comment()
    {
        $comment = Comment::factory()->create();

        $this->actingAs($this->admin, 'admin');

        $response = $this->post("/admin/comment/delete/{$comment->id}", ['comment_id' => $comment->id]);

        $response->assertRedirect();

        $this->assertDatabaseMissing('comments', ['id' => $comment->id]);

        $this->assertAuthenticatedAs($this->admin, 'admin');
    }

    public function test_delete_user()
    {
        $this->actingAs($this->admin, 'admin');

        $response = $this->post("/admin/user/delete/{$this->user->id}", ['user_id' => $this->user->id]);

        $response->assertRedirect();

        $this->assertDatabaseMissing('users', ['id' => $this->user->id]);

        $this->assertAuthenticatedAs($this->admin, 'admin');
    }
}
