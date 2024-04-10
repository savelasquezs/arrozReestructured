<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItem>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "order_id" => Order::all()->random()["id"],
            "product_id" => Product::all()->random()["id"],
            "quantity" => rand(1, 15),
            "unit_price" => rand(1, 15) * 1000,
            "discount" => rand(1, 15),
        ];
    }
}
