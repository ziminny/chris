<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->unique()->safeEmail,
            'sale_price' => $this->faker->randomFloat(3,0,100),
            'cost_price' => $this->faker->randomFloat(3,0,100),
            'amount' => $this->faker->randomDigit,
            'user_id' => User::factory(),
        ];

    }
}
