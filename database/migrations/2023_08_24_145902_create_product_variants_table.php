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
        Schema::create('product_variants', function (Blueprint $table) {
            $table->id('product_variant_id'); // Primary Key
            $table->unsignedBigInteger('product_id'); // Foreign Key referencing Product Table
            $table->string('product_variant_sku');
            $table->string('variant_name_short');
            $table->string('variant_name_long');
            $table->decimal('variant_price', 10, 2); // Decimal field for variant price
            $table->integer('variant_stock')->default(0); // Default to 0
            $table->string('product_variant_short_name');
            $table->string('product_variant_long_name');
            $table->timestamps();

            // Define foreign key constraint
            $table->foreign('product_id')->references('product_id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_variants');
    }
};
