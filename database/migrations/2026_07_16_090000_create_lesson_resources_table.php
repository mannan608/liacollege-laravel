<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lesson_resources', function (Blueprint $table) {
            $table->id();

            $table->foreignId('lesson_id')
                ->constrained('lessons')
                ->cascadeOnDelete();

            $table->string('title');

            $table->enum('resource_type', ['video', 'pdf', 'ppt', 'zip', 'audio'])
                ->default('pdf');

            $table->string('file_path')->nullable();

            $table->unsignedInteger('sort_order')
                ->default(0);

            $table->timestamps();

            $table->index('lesson_id');
            $table->index('resource_type');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lesson_resources');
    }
};
