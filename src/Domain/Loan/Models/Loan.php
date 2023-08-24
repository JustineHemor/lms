<?php

namespace Domain\Loan\Models;

use Domain\LoanType\Models\LoanType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Loan extends Model
{
    use HasFactory;

    protected $attributes = [
        'status' => 'pending',
    ];

    public function loan_type(): BelongsTo
    {
        return $this->belongsTo(LoanType::class);
    }
}
