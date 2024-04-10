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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("customer_id");
            $table->unsignedBigInteger("delivery_person_id")->nullable();
            $table->unsignedBigInteger("delivery_method_id");
            $table->unsignedBigInteger("order_status_id");
            $table->foreign("customer_id")->references("id")->on("customers");
            $table->foreign("order_status_id")->references("id")->on("order_statuses");
            $table->foreign("delivery_person_id")->references("id")->on("users");
            $table->foreign("delivery_method_id")->references("id")->on("delivery_methods");
            $table->string("gift")->nullable();
            $table->string("delivery_address")->nullable();
            $table->text("description")->nullable();
            $table->integer("discount")->nullable();
            $table->time("time_delivered")->nullable();
            $table->time("time_cooked")->nullable();
            $table->time("time_on_table")->nullable();
            $table->integer("total");
            $table->integer("amount_to_collect")->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
