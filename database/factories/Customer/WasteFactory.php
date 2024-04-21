<?php

namespace Database\Factories\Customer;

use App\Models\Customer\Waste;
use Illuminate\Database\Eloquent\Factories\Factory;

class WasteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Waste::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_name' => $this->faker->company,
            'site' => $this->faker->address,
            'year' => $this->faker->year,
            'month' => $this->faker->numberBetween(1, 12),
            'waste_type' => $this->faker->randomElement(['Organic', 'Plastic', 'Metal', 'Paper']),
            'estimated_quantity' => $this->faker->numberBetween(100, 1000), // kg
            'actual_quantity' => $this->faker->numberBetween(100, 1000) // kg
        ];
    }
}