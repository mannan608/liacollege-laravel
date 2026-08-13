<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('eligibility_applications', function (Blueprint $table) {
            $table->id();

            // Step 1
            $table->string('name');
            $table->string('email');
            $table->string('phone', 30);

            // Step 2
            $table->string('industry')->nullable();
            $table->string('qualification')->nullable();
            $table->unsignedInteger('experience_years')->nullable();

            // Step 3
            $table->string('state')->nullable();
            $table->boolean('terms_accepted')->default(false);

            // Form progress
            $table->unsignedTinyInteger('current_step')->default(1);

            // draft / submitted
            $table->string('status')->default('draft');

            $table->timestamps();

            $table->index('email');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('eligibility_applications');
    }
};