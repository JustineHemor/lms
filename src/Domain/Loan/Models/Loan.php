<?php

namespace Domain\Loan\Models;

use Database\Factories\LoanFactory;
use Domain\LoanType\Models\LoanType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static LoanFactory factory($count = null, $state = [])
 */
class Loan extends Model
{
    use HasFactory;

    protected $attributes = [
        'status' => 'pending',
    ];

    protected static function newFactory(): LoanFactory
    {
        return new LoanFactory();
    }

    public function loan_type(): BelongsTo
    {
        return $this->belongsTo(LoanType::class);
    }
}
