<?php

namespace Database\Factories;
use App\Models\customer;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customers_name' => $this->faker->name(),
            'customers_email' => $this->faker->unique()->safeEmail(),
            'updated_by' => $this->faker->numberBetween(1, 10),
            'created_by' => $this->faker->numberBetween(1, 10),
            'is_active' => $this->faker->boolean()
        ];
    }

}
