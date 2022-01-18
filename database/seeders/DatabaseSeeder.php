<?php

namespace Database\Seeders;

use App\Models\Chef;
use App\Models\Dish;
use App\Models\Ingredient;
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
        $this->call(CountrySeeder::class);
        
        Dish::factory(10)->create()->each(function ($dish) {
            $dish->chefs()->attach(Chef::factory(2)->create());

            $dish->ingredients()->createMany(Ingredient::factory(4)->make()->toArray());
        });
    }
}
