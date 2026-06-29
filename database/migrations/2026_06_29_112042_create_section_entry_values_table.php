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
        Schema::create('section_entry_values', function (Blueprint $table) {
            $table->id();
            $table->foreignId('section_entry_id')->constrained()->cascadeOnDelete();
            $table->foreignId('section_field_id')->constrained()->cascadeOnDelete();
            $table->text('value_text')->nullable();
            $table->string('value_file_path')->nullable();
            $table->timestamps();
            
            $table->unique(['section_entry_id', 'section_field_id']);
            $table->index(['section_field_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('section_entry_values');
    }
};
