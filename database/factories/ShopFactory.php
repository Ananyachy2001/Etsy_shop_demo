<?php

namespace Database\Factories;

use App\Models\Shop;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shop>
 */
class ShopFactory extends Factory
{
    protected $model = Shop::class;

    public function definition()
    {
        return [
            'shop_id' => $this->faker->randomNumber(),
            'user_id' => $this->faker->randomNumber(),
            'shop_name' => $this->faker->word,
            'create_date' => $this->faker->dateTimeThisDecade(),
            'created_timestamp' => $this->faker->dateTimeThisDecade(),
            'title' => $this->faker->sentence,
            'announcement' => $this->faker->paragraph,
            'currency_code' => $this->faker->currencyCode,
            'is_vacation' => $this->faker->boolean,
            'vacation_message' => $this->faker->paragraph,
            'sale_message' => $this->faker->paragraph,
            'digital_sale_message' => $this->faker->paragraph,
            'update_date' => $this->faker->dateTimeThisDecade(),
            'updated_timestamp' => $this->faker->dateTimeThisDecade(),
            'listing_active_count' => $this->faker->randomNumber(),
            'digital_listing_count' => $this->faker->randomNumber(),
            'login_name' => $this->faker->word,
            'accepts_custom_requests' => $this->faker->boolean,
            'policy_welcome' => $this->faker->word,
            'policy_payment' => $this->faker->word,
            'policy_shipping' => $this->faker->word,
            'policy_refunds' => $this->faker->word,
            'policy_additional' => $this->faker->word,
            'policy_seller_info' => $this->faker->word,
            'policy_update_date' => $this->faker->dateTimeThisDecade(),
            'policy_has_private_receipt_info' => $this->faker->boolean,
            'has_unstructured_policies' => $this->faker->boolean,
            'policy_privacy' => $this->faker->word,
            'vacation_autoreply' => $this->faker->word,
            'url' => $this->faker->url,
            'image_url_760x100' => $this->faker->imageUrl(760, 100),
            'num_favorers' => $this->faker->randomNumber(),
            'languages' => json_encode([$this->faker->word]), // Convert array to JSON
            'icon_url_fullxfull' => $this->faker->imageUrl(),
            'is_using_structured_policies' => $this->faker->boolean,
            'has_onboarded_structured_policies' => $this->faker->boolean,
            'include_dispute_form_link' => $this->faker->boolean,
            'is_direct_checkout_onboarded' => $this->faker->boolean,
            'is_etsy_payments_onboarded' => $this->faker->boolean,
            'is_calculated_eligible' => $this->faker->boolean,
            'is_opted_in_to_buyer_promise' => $this->faker->boolean,
            'is_shop_us_based' => $this->faker->boolean,
            'transaction_sold_count' => $this->faker->randomNumber(),
            'shipping_from_country_iso' => $this->faker->countryCode,
            'shop_location_country_iso' => $this->faker->countryCode,
            'review_count' => $this->faker->randomNumber(),
            'review_average' => $this->faker->randomFloat(2, 0, 5),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
