<?php

namespace Database\Factories;

use App\Models\Entity;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PaymentItem>
 */
class PaymentItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "bank_id" => Entity::where("entity_type_id", 1)->get()->random()['id'],
            "order_id" => Order::all()->random()["id"],
            "value" => rand(5, 10) * 1000,
        ];
    }
}
