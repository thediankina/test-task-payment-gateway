<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * @inheritdoc
     */
    public function definition(): array
    {
        $cardDetails = fake()->creditCardDetails();

        return [
            'name' => $cardDetails['name'],
            'email' => fake()->safeEmail(),
            'card_type' => $cardDetails['type'],
            'card_number' => $cardDetails['number'],
            'card_expiration_date' => $cardDetails['expirationDate'],
            'card_code' => fake()->randomNumber(3, true),
        ];
    }
}
