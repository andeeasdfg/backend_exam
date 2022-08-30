<?php

namespace Database\Factories;

use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Products::class;

    public function definition()
    {
        return [
           'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'category' => $this->faker->word(),
            'time_and_date' => $this->faker->date(),
        ];
    }
}
