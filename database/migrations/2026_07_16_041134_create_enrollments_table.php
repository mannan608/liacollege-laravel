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

    $table->unique([
        'student_id',
        'course_slot_id'
    ], 'student_slot_unique');
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
