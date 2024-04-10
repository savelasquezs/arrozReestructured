<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payment_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("bank_id");
            $table->unsignedBigInteger("order_id");
            $table->foreign("bank_id")->references("id")->on("entities");
            $table->foreign("order_id")->references("id")->on("orders");
            $table->integer("value");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_items');
    }
};
