<?php

namespace Database\Factories;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Payment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'buyer_user_id' => $this->faker->uuid,
            'shop_id' => $this->faker->uuid,
            'receipt_id' => $this->faker->uuid,
            'amount_gross' => $this->faker->randomFloat(2, 10, 1000),
            'amount_fees' => $this->faker->randomFloat(2, 1, 100),
            'amount_net' => $this->faker->randomFloat(2, 10, 900),
            'posted_fees' => $this->faker->randomFloat(2, 1, 100),
            'posted_net' => $this->faker->randomFloat(2, 10, 900),
            'adjusted_gross' => $this->faker->randomFloat(2, 10, 1000),
            'adjusted_fees' => $this->faker->randomFloat(2, 1, 100),
            'adjusted_net' => $this->faker->randomFloat(2, 10, 900),
            'currency' => $this->faker->currencyCode,
            'shop_currency' => $this->faker->currencyCode,
            'shipping_user_id' => $this->faker->uuid,
            'shipping_address_id' => $this->faker->uuid,
            'billing_address_id' => $this->faker->uuid,
            'status' => $this->faker->randomElement(['pending', 'completed', 'cancelled']),
            'shipped_timestamp' => $this->faker->dateTime,
            'create_timestamp' => $this->faker->dateTime,
            'created_timestamp' => $this->faker->dateTime,
            'update_timestamp' => $this->faker->dateTime,
            'payment_adjustments' => $this->faker->sentence,
        ];
    }
}
