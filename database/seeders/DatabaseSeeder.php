<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       // \App\Models\User::factory(20)->create();
       \App\Models\Rule::factory(6)->create();
       \App\Models\Category::factory(6)->create();
       \App\Models\Product::factory(6)->create();


$products = Product::all();



Category::all()->each(function ($category) use ($products) { 
    $category->products()->attach(
        $products->random(rand(1, 3))->pluck('id')->toArray()
    ); 
});
           
    }
}
