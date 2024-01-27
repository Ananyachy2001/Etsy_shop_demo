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
        Schema::create('shops', function (Blueprint $table) {
            $table->bigIncrements('shop_id'); // Change this to 'bigIncrements' and make it primary
            $table->unsignedBigInteger('user_id');
            $table->string('shop_name');
            $table->timestamp('create_date')->nullable();
            $table->timestamp('created_timestamp')->nullable();
            $table->string('title');
            $table->text('announcement');
            $table->string('currency_code');
            $table->boolean('is_vacation');
            $table->text('vacation_message');
            $table->text('sale_message');
            $table->text('digital_sale_message');
            $table->timestamp('update_date')->nullable();
            $table->timestamp('updated_timestamp')->nullable();
            $table->integer('listing_active_count');
            $table->integer('digital_listing_count');
            $table->string('login_name');
            $table->boolean('accepts_custom_requests');
            $table->string('policy_welcome');
            $table->string('policy_payment');
            $table->string('policy_shipping');
            $table->string('policy_refunds');
            $table->string('policy_additional');
            $table->string('policy_seller_info');
            $table->timestamp('policy_update_date')->nullable();
            $table->boolean('policy_has_private_receipt_info');
            $table->boolean('has_unstructured_policies');
            $table->string('policy_privacy');
            $table->string('vacation_autoreply');
            $table->string('url');
            $table->string('image_url_760x100');
            $table->integer('num_favorers');
            $table->json('languages');
            $table->string('icon_url_fullxfull');
            $table->boolean('is_using_structured_policies');
            $table->boolean('has_onboarded_structured_policies');
            $table->boolean('include_dispute_form_link');
            $table->boolean('is_direct_checkout_onboarded');
            $table->boolean('is_etsy_payments_onboarded');
            $table->boolean('is_calculated_eligible');
            $table->boolean('is_opted_in_to_buyer_promise');
            $table->boolean('is_shop_us_based');
            $table->integer('transaction_sold_count');
            $table->string('shipping_from_country_iso');
            $table->string('shop_location_country_iso');
            $table->integer('review_count');
            $table->decimal('review_average', 5, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shops');
    }
};
