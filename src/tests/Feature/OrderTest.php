<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Item;
use App\Models\User;
use App\Models\ShippingAddress;
use App\Models\PaymentType;

class OrderTest extends TestCase
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

    public function test_purchase_page()
    {
        $this->actingAs($this->user);
        $item = $this->items->first();

        $response = $this->get("/purchase/{$item->id}");

        $response->assertStatus(200)
            ->assertViewHas('item', $item);

        $this->assertAuthenticatedAs($this->user, 'web');
    }

    public function test_submit_purchase()
    {
        $this->actingAs($this->user);
        $this->seed(\Database\Seeders\PaymentTypesTableSeeder::class);

        $item = $this->items->first();

        $shipping_address = [
            'postal_code' => '1234567',
            'address' => 'テスト住所',
            'building' => 'テストビル',
        ];
        session(['shipping_address' => $shipping_address]);

        $payment_type = 2;
        ShippingAddress::create(array_merge($shipping_address, ['user_id' => $this->user->id]));
        $response = $this->post("/purchase/{$item->id}",[
                'shipping_address' => $shipping_address,
                'payment_type' => $payment_type,
            ],
        );

        $response->assertRedirect('/');

        $this->assertDatabaseHas('orders', [
            'user_id' => $this->user->id,
            'item_id' => $item->id,
            'payment_type_id' => 2,
            'shipping_address_id' => 2,
        ]);
        $this->assertAuthenticatedAs($this->user, 'web');

    }

    public function test_address_form()
    {
        $this->actingAs($this->user);
        $item = $this->items->first();

        $response = $this->get("/purchase/address/{$item->id}");

        $response->assertStatus(200);

        $this->assertAuthenticatedAs($this->user, 'web');
    }

    public function test_store_address()
    {
        $this->actingAs($this->user);
        $item = $this->items->first();

        $shipping_address = [
            'postal_code' => '1234567',
            'address' => 'テスト住所',
            'building' => 'テストビル',
        ];

        $response = $this->post("/purchase/address/{$item->id}", $shipping_address);

        $response->assertRedirect("/purchase/{$item->id}");

        $this->assertEquals(session('shipping_address'), $shipping_address);

        $this->assertAuthenticatedAs($this->user, 'web');
    }

    public function test_payment_form()
    {
        $this->actingAs($this->user);
        $item = $this->items->first();

        $response = $this->get("/purchase/payment/{$item->id}");

        $response->assertStatus(200);

        $this->assertAuthenticatedAs($this->user, 'web');
    }

    public function test_store_payment()
    {
        $this->actingAs($this->user);
        $item = $this->items->first();
        $this->seed(\Database\Seeders\PaymentTypesTableSeeder::class);

        $payment_type_id = PaymentType::first()->id;

        $response = $this->post("/purchase/payment/{$item->id}", ['id' => $payment_type_id]);

        $response->assertRedirect("/purchase/{$item->id}");

        $this->assertEquals(session('selected_payment_type'), [
            'id' => $payment_type_id,
            'name' => PaymentType::findOrFail($payment_type_id)->name,
        ]);

        $this->assertAuthenticatedAs($this->user, 'web');
    }

}
