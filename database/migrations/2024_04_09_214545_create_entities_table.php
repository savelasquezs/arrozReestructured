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
        Schema::create('entities', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->integer("current_value");
            $table->string("image_url");

            $table->unsignedBigInteger("entity_type_id");
            $table->foreign("entity_type_id")->references("id")->on("entity_types");

            $table->unsignedBigInteger("deposit_bank_id")->nullable();
            $table->foreign("deposit_bank_id")->references("id")->on("entities");


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entities');
    }
};
