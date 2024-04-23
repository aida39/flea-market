<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => '',
            'condition_id' => '',
            'name' => $this->faker->word(),
            'brand' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'image_path' => '/images/item_01.jpg',
            'price' => $this->faker->randomNumber(5),
            'recommend_flag' => '1',
        ];
    }
}
