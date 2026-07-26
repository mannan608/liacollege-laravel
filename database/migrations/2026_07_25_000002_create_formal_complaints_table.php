<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('formal_complaints', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->boolean('auth_disclosure')->default(false);
            $table->boolean('auth_terms')->default(false);
            $table->string('contacted')->nullable();
            $table->json('complaint_types')->nullable();
            $table->string('recognised_code')->nullable();
            $table->string('course_title')->nullable();
            $table->string('year_enrolled')->nullable();
            $table->text('services_description')->nullable();
            $table->text('complaint_description')->nullable();
            $table->text('resolution_attempts')->nullable();
            $table->text('additional_information')->nullable();
            $table->text('desired_outcome')->nullable();
            $table->string('declarant_name')->nullable();
            $table->dateTime('submission_date')->nullable();
            $table->string('status')->default('pending');
            $table->text('admin_notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('formal_complaints');
    }
};
