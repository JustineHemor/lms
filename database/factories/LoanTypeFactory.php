<?php

namespace Database\Factories;

use Domain\LoanType\Models\LoanType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Domain\LoanType\Models\LoanType>
 */
class LoanTypeFactory extends Factory
{
    protected $model = LoanType::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->words(2, true),
            'interest_rate' => $this->faker->randomFloat(2, 0.5, 1),
            'service_fee' => $this->faker->randomFloat(2, 0.5, 1),
        ];
    }
}
