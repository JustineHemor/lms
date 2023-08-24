<?php

namespace Domain\LoanType\Models;

use Database\Factories\LoanTypeFactory;
use Domain\Loan\Models\Loan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static LoanTypeFactory factory($count = null, $state = [])
 */
class LoanType extends Model
{
    use HasFactory;

    protected static function newFactory(): LoanTypeFactory
    {
        return new LoanTypeFactory();
    }

    public function loans(): HasMany
    {
        return $this->hasMany(Loan::class);
    }
}
