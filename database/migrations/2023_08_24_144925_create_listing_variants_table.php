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
        Schema::create('listing_variants', function (Blueprint $table) {
            $table->id('listing_variant_id'); // Primary Key
            $table->unsignedBigInteger('listing_id'); // Foreign Key referencing Listing Table
            $table->string('variant_name');
            $table->decimal('variant_price', 10, 2); // Decimal field for variant price
            $table->integer('variant_stock')->default(0); // Default to 0
            $table->string('variant_image'); // Image path or URL
            $table->text('variant_description');
            $table->string('variant_sku');
            $table->timestamps();

            // Define foreign key constraint
            $table->foreign('listing_id')->references('listing_id')->on('listings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listing_variants');
    }
};
