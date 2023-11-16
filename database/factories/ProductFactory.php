<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name'=>$this->faker->name,
            'description'=>$this->faker->text(),
            'qty'=>$this->faker->numberBetween(5,10),
            'unit_price'=>$this->faker->numberBetween(100,350),
            'amount'=>$this->faker->numberBetween(50,80),
        ];
    }
}
