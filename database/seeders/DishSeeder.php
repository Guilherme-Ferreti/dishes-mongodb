<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Chef;
use App\Models\Dish;
use App\Models\Ingredient;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $chefs = Chef::factory(100)->create();
        $ingredients = Ingredient::factory(100)->make();

        Dish::factory(200)->create()->each(function ($dish) use ($chefs, $ingredients) {
            $dish->chefs()->attach($chefs->random(2)->pluck('id')->toArray());

            $dish->ingredients()->createMany($ingredients->random(5)->toArray());
        });
    }
}
