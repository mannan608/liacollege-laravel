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
        Schema::create('section_fields', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_section_id')->constrained()->cascadeOnDelete();
            $table->string('field_key');
            $table->string('label');
            $table->boolean('is_required')->default(false);
            $table->integer('order')->default(0);
            $table->timestamps();
            $table->softDeletes();
            
            $table->unique(['course_section_id', 'field_key']);
            $table->index(['course_section_id', 'order']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('section_fields');
    }
};
