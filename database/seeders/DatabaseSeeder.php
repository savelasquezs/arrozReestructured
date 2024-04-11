<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Customer;
use App\Models\DeliveryMethod;
use App\Models\Entity;
use App\Models\EntityType;
use App\Models\Expense;
use App\Models\ExpenseCategory;
use App\Models\ExpenseItem;
use App\Models\Neighborhood;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderStatus;
use App\Models\PaymentItem;
use App\Models\Phone;
use App\Models\ProductCategory;
use App\Models\ProductSize;
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
        User::factory(10)->create();

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

        Customer::factory(10)->create();
        Neighborhood::factory(20)->create();
        Phone::factory(25)->create();
        Address::factory(50)->create();

        ProductCategory::factory()->hasSizes(5)->create(["name" => "arroces"]);
        ProductCategory::factory()->hasSizes(3)->create(["name" => "gaseosas"]);

        $riceSizes = ProductSize::where("product_category_id", 1)->get();
        foreach ($riceSizes as $size) {
            $size->products()->createMany([
                ["name" => "ropa vieja", "price" => rand(1, 100) * 1000,],
                ["name" => "ranchero", "price" => rand(1, 100) * 1000,],
                ["name" => "carbonara", "price" => rand(1, 100) * 1000]
            ]);
        }
        $sodaSizes = ProductSize::where("product_category_id", 2)->get();
        foreach ($sodaSizes as $size) {
            $size->products()->createMany([
                ["name" => "Cocacola", "price" => rand(1, 100) * 1000,],
                ["name" => "Quatro", "price" => rand(1, 100) * 1000,],
                ["name" => "Sprite", "price" => rand(1, 100) * 1000,],
            ]);
        }
        DeliveryMethod::create(["name" => "ToTake"]);
        DeliveryMethod::create(["name" => "Delivery"]);
        OrderStatus::create(["name" => "InKitchen"]);
        OrderStatus::create(["name" => "InTable"]);
        OrderStatus::create(["name" => "InRoute"]);
        OrderStatus::create(["name" => "Done"]);
        Order::factory(50)->create();
        PaymentItem::factory(80)->create();
        OrderItem::factory(200)->create();
    }
}
