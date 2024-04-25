<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Condition;

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
        $user = User::inRandomOrder()->first();
        $condition = Condition::inRandomOrder()->first();

        return [
            'user_id' => $user->id,
            'condition_id' => $condition->id,
            'name' => $this->faker->word(),
            'brand' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'image_path' => '/images/item_01.jpg',
            'price' => $this->faker->randomNumber(5),
            'recommend_flag' => '1',
        ];
    }
}
