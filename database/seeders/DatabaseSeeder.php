<?php

namespace Database\Seeders;

use App\Models\Entity;
use App\Models\EntityType;
use App\Models\Expense;
use App\Models\ExpenseCategory;
use App\Models\ExpenseItem;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        ExpenseCategory::factory(5)->create();
        EntityType::factory()->create(["name" => "bank"]);
        EntityType::factory()->create(["name" => "app"]);
        Entity::factory(20)->create();
        ExpenseItem::factory(5)->create();
        Expense::factory(50)->create();
    }
}
