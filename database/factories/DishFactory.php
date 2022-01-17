<?php

namespace Database\Factories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

class DishFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'price' => $this->faker->numberBetween(1, 250),
            'country_id' => Country::all('id')->random()->id,
        ];
    }
}
