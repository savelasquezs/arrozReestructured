<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\DeliveryMethod;
use App\Models\OrderStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "customer_id" => $customer = Customer::all()->random(),
            "order_status_id" => OrderStatus::all()->random()["id"],
            "delivery_person_id" => User::all()->random(),
            "delivery_method_id" => DeliveryMethod::all()->random()["id"],
            "gift" => fake()->word(),
            "description" => fake()->sentence(),
            "discount" => rand(2, 5) * 10,
            "time_delivered" => fake()->time(),
            "time_cooked" => fake()->time(),
            "time_on_table" => fake()->time(),
            "amount_to_collect" => rand(2, 25) * 10000,
            "total" => rand(25, 250) * 1000,
            "delivery_address" => $customer->addresses()->get()->random()->address,

        ];
    }
}
