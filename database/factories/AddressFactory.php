<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Neighborhood;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "customer_id" => Customer::all()->random()["id"],
            "neighborhood_id" => Neighborhood::all()->random()["id"],
            "address" => fake()->address(),
            "shipping_value" => rand(1, 8) * 1000,
        ];
    }
}
