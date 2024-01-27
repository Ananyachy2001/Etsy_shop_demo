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
        Schema::create('listings', function (Blueprint $table) {
            $table->id('listing_id'); // Primary Key
            $table->unsignedBigInteger('shop_id'); // Foreign Key referencing Shop Table
            $table->unsignedBigInteger('received_order_id')->nullable(); // Foreign Key referencing Received Orders Table
            $table->string('listing_sku');
            $table->string('listing_name');
            $table->string('listing_short_name');
            $table->string('listing_long_name');
            $table->timestamps();
    
            // Define foreign key constraints
            $table->foreign('shop_id')->references('shop_id')->on('shops')->onDelete('cascade');
            $table->foreign('received_order_id')->references('received_order_id')->on('received_orders')->onDelete('set null'); // Ensure it references the correct column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listings');
    }
};
