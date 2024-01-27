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
        Schema::create('received_orders', function (Blueprint $table) {
            $table->id('received_order_id'); // Primary Key
            $table->unsignedBigInteger('shop_id'); // Foreign Key referencing Shop Table
            $table->unsignedBigInteger('user_id'); // Foreign Key referencing User Table
            $table->string('client_name');
            $table->string('client_address');
            $table->string('ordered_listings_sku'); // Assuming it's a comma-separated list of SKUs
            $table->decimal('order_total', 10, 2); // Decimal field for order total
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('shop_id')->references('shop_id')->on('shops')->onDelete('cascade');
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('received_orders');
    }
};
