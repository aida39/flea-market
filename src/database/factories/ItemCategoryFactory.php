<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Item;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ItemCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $item = Item::inRandomOrder()->first();
        $category = Category::inRandomOrder()->first();

        return [
            'item_id' => $item->id,
            'category_id' => $category->id,
        ];
    }
}
