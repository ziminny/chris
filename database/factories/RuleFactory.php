<?php

namespace Database\Factories;

use App\Models\Rule;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RuleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Rule::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $array = ['admin','salesman','inactive'];
        shuffle($array);
        return [
            'permission' => $array[0],
            'user_id' => User::factory(),

        ];
    }
}
