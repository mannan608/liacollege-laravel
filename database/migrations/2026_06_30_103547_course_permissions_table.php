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
        Schema::create('course_permissions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('student_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->foreignId('course_id')
                ->constrained()
                ->cascadeOnDelete();

            // NULL = Full Course Permission
            $table->foreignId('section_id')
                ->nullable()
                ->constrained('course_sections')
                ->nullOnDelete();

            // NULL = Full Section Permission
            $table->foreignId('row_id')
                ->nullable()
                ->constrained('course_section_rows')
                ->nullOnDelete();
                $table->json('doc_permissions')->nullable();

            $table->timestamps();

            // Prevent duplicate permissions
            $table->unique([
                'student_id',
                'course_id',
                'section_id',
                'row_id'
            ], 'course_permission_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_permissions');
    }
};