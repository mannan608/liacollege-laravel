<?php

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
        Schema::create('enrollments', function (Blueprint $table) {

            $table->id();

            $table->foreignId('student_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('course_slot_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('voucher_code')->nullable();

            $table->string('purchase_order_ref')->nullable();

            $table->decimal('amount', 10, 2)->default(0);

            $table->enum('payment_method', [
                'visa',
                'mastercard',
                'bank_transfer',
                'cash'
            ])->nullable();

            $table->enum('payment_status', [
                'unpaid',
                'pending',
                'paid',
                'failed',
                'refunded'
            ])->default('unpaid');

            $table->enum('status', [
                'pending',
                'confirmed',
                'cancelled',
                'completed'
            ])->default('pending');

            $table->text('remarks')->nullable();

            $table->foreignId('approved_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamp('approved_at')->nullable();

            $table->timestamp('enrolled_at')->nullable();

            $table->timestamp('completed_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};
