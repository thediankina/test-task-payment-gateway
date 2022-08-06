<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    /**
     * @inheritdoc
     */
    public function definition(): array
    {
        $amount = fake()->randomNumber();
        // Call to signature formation functions
        $testSignature1 = 'f027612e0e6cb321ca161de060237eeb97e46000da39d3add08d09074f931728';
        $testSignature2 = 'SNuHufEJ';

        return [
            'status' => 'new',
            'amount' => $amount,
            'amount_paid' => fake()->numberBetween(0, $amount),
            'timestamp' => now()->timestamp,
            'signature_1' => $testSignature1,
            'signature_2' => $testSignature2,
        ];
    }
}
