<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Item;
use App\Models\User;
use App\Models\Comment;
use App\Models\Favorite;
use App\Models\Condition;
use App\Models\Category;
use App\Models\ItemCategory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class ItemTest extends TestCase
{
    use RefreshDatabase;

    protected $user;
    protected $items;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();

        $this->seed(\Database\Seeders\ConditionsTableSeeder::class);
        $this->seed(\Database\Seeders\CategoriesTableSeeder::class);

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

    public function test_search_function()
    {
        $response = $this->get('/search', ['keyword' => 'test_keyword']);

        $response->assertStatus(200)
            ->assertViewHas('items', $this->items);
    }

    public function test_listing_form()
    {
        $this->actingAs($this->user);

        $categories = Category::all();
        $conditions = Condition::all();

        $response = $this->get('/sell');

        $response->assertStatus(200)
            ->assertViewHas('categories', $categories)
            ->assertViewHas('conditions', $conditions);
    }

    public function test_store_item()
    {
        // テスト用のユーザーを作成し、ログインする
        $this->actingAs($this->user);

        // テスト用のモック画像を生成する
        // $file = UploadedFile::fake()->image('test_image.jpg');

        // テスト用のリクエストデータを作成する
        $request_data = [
            'condition_id' => 1,
            'name' => 'Test Item',
            'brand' => 'Test Brand',
            'description' => 'Test Description',
            'price' => 1000,
            'category_id' => [1,5], // カテゴリーIDを配列で指定
            // 'image' => $file, // テスト用の画像ファイルを指定
        ];

        // モックを使用してリクエストを作成する
        $response = $this->post('/sell', $request_data);

        // リダイレクトが正しく行われたかどうかを確認する
        $response->assertRedirect('/mypage');

        // // データベースにアイテムが作成されたかどうかを確認する
        // $this->assertDatabaseHas('items', [
        //     'name' => 'Test Item',
        //     'brand' => 'Test Brand',
        //     'description' => 'Test Description',
        //     'price' => 1000,
        //     'user_id' => $this->user->id,
        //     'recommend_flag' => '1',
        // ]);

        // // データベースにカテゴリーが正しく関連付けられたかどうかを確認する
        // $item = Item::where('name', 'Test Item')->first();
        // $this->assertEquals(1, $item->categories()->count());

        // // アップロードされた画像が保存されたかどうかを確認する
        // Storage::disk('public')->assertExists('images/' . $file->hashName());
    }

}
