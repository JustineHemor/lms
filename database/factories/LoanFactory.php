<?php

namespace Database\Factories;

use Carbon\Carbon;
use Domain\Loan\Models\Loan;
use Illuminate\Database\Eloquent\Factories\Factory;

class LoanFactory extends Factory
{
    protected $model = Loan::class;

    public function definition(): array
    {
        return [
            'state' => 'pending',
            'requester_id' => UserFactory::class,
            'application_number' => Carbon::today()->format('ymd-').$this->faker->numerify('#####'),
            'loan_type_id' => LoanTypeFactory::class,
            'payment_term' => '10',
            
        ];
    }
}
