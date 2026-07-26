<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->boolean('authorisation')->default(false);
            $table->string('contacted')->nullable();
            $table->json('issue_types')->nullable();
            $table->string('recognised_code')->nullable();
            $table->string('course_title')->nullable();
            $table->string('year_enrolled')->nullable();
            $table->string('question_id')->nullable();
            $table->text('description')->nullable();
            $table->string('status')->default('pending');
            $table->text('admin_notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
