<?php

namespace Database\Factories;

use App\Models\Entity;
use App\Models\ExpenseItem;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Expense>
 */
class ExpenseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "quantity" => rand(1, 5),
            "total_paid" => rand(10000, 500000),
            "expense_item_id" => ExpenseItem::all()->random()["id"],
            "bank_id" => Entity::where("entity_type_id", 1)->get()->random()["id"]
        ];
    }
}
