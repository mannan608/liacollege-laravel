<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('quizzes', function (Blueprint $table) {
            $table->foreignId('course_id')
                ->nullable()
                ->after('user_id')
                ->constrained('courses')
                ->nullOnDelete();

            $table->foreignId('module_id')
                ->nullable()
                ->after('course_id')
                ->constrained('modules')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('quizzes', function (Blueprint $table) {
            $table->dropConstrainedForeignId('module_id');
            $table->dropConstrainedForeignId('course_id');
        });
    }
};
