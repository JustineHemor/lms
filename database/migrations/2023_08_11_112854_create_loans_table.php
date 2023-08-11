<?php

use App\Models\User;
use Domain\Loan\Models\Loan;
use Domain\LoanType\Models\LoanType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->string('state')->index();
            $table->foreignIdFor(User::class, 'requester_id')->index();
            $table->string('application_number')->index();
            $table->foreignIdFor(LoanType::class, 'loan_type_id')->index();
            $table->string('payment_term');
            $table->decimal('requested_amount');
            $table->decimal('approved_amount')->nullable();
            $table->decimal('interest');
            $table->decimal('total_payable');
            $table->decimal('monthly_payable');
            $table->decimal('service_fee');
            $table->decimal('balance');
            $table->dateTime('activated_at')->nullable();
            $table->dateTime('completed_at')->nullable();
            $table->dateTime('renewed_at')->nullable();
            $table->dateTime('cancelled_at')->nullable();
            $table->dateTime('rejected_at')->nullable();
            $table->text('rejection_reason')->nullable();
            $table->integer('needed_approval_count');
            $table->integer('approval_count');
            $table->foreignIdFor(Loan::class, 'renewed_on')->index();
            $table->foreignIdFor(Loan::class, 'renewed_to')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
