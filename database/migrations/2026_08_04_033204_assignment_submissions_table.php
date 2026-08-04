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
       Schema::create('assignment_submissions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('assignment_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('student_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('file')->nullable();

            $table->longText('comment')->nullable();

            $table->dateTime('submitted_at')->nullable();

            $table->unsignedInteger('marks')->nullable();

            $table->longText('feedback')->nullable();

            $table->enum('status', [
                'submitted',
                'graded',
                'returned',
            ])->default('submitted');

            $table->timestamps();

            // One submission per student per assignment.
            $table->unique([
                'assignment_id',
                'student_id',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignment_submissions');
    }
};
