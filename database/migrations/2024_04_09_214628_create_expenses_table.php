<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();

            $table->integer("quantity");
            $table->integer("total_paid");

            $table->unsignedBigInteger("expense_item_id")->nullable();
            $table->foreign("expense_item_id")->references("id")->on("expense_items");

            $table->unsignedBigInteger("bank_id")->nullable();
            $table->foreign("bank_id")->references("id")->on("entities");





            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
