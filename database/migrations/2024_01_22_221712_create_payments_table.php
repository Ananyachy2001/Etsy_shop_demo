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
        Schema::create('payments', function (Blueprint $table) {
            $table->id('payment_id'); // Primary Key
            $table->string('buyer_user_id');
            $table->string('shop_id');
            $table->string('receipt_id');
            $table->string('amount_gross');
            $table->string('amount_fees');
            $table->string('amount_net');
            $table->string('posted_fees');
            $table->string('posted_net');
            $table->string('adjusted_gross');
            $table->string('adjusted_fees');
            $table->string('adjusted_net');
            $table->string('currency');
            $table->string('shop_currency');
            $table->string('shipping_user_id');
            $table->string('shipping_address_id');
            $table->string('billing_address_id');
            $table->string('status');
            $table->string('shipped_timestamp');
            $table->string('create_timestamp');
            $table->string('created_timestamp');
            $table->string('update_timestamp');
            $table->string('payment_adjustments');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
