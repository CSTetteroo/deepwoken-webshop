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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('Product Name');
            $table->text('description');
            $table->decimal('price')->nullable(true)->default(NULL);
            $table->integer('amount_available')->default(0);
            $table->boolean('is_relic')->default(false);
            $table->boolean('is_weapon')->default(false);
            $table->boolean('is_consumable')->default(false);
            $table->boolean('is_equipment')->default(false);
            $table->boolean('is_misc')->default(false);
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
