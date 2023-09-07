<?php

namespace Database\Factories;

use App\Models\User;
use Carbon\Carbon;
use Domain\Loan\Models\Loan;
use Domain\LoanType\Models\LoanType;
use Illuminate\Database\Eloquent\Factories\Factory;

class LoanFactory extends Factory
{
    protected $model = Loan::class;

    public function definition(): array
    {
        return [
            'state' => 'pending',
            'requester_id' => User::factory(),
            'application_number' => Carbon::today()->format('ymd-').$this->faker->numerify('#####'),
            'loan_type_id' => LoanType::factory(),
            'payment_term' => '10',
            'amount' => $this->faker->numerify('#####'),
            'interest' => $this->faker->numerify('####'),
            'total_payable' => $this->faker->numerify('####'),
            'monthly_payable' => $this->faker->numerify('####'),
            'service_fee' => $this->faker->numerify('###'),
            'balance' => $this->faker->numerify('#####'),
        ];
    }
}
