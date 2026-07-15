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
        Schema::create('lessons', function (Blueprint $table) {
    $table->id();

    $table->foreignId('module_id')
        ->constrained()
        ->cascadeOnDelete();

    $table->string('title');

    $table->longText('content')->nullable();
    $table->json('lesson_types')
        ->default(json_encode(['text']))
        ->comment('Multiple lesson types: video, pdf, text, mixed, quiz, assignment, link');

    $table->unsignedInteger('duration')
        ->default(0)
        ->comment('Duration in minutes');

    $table->boolean('status')
        ->default(true);

    $table->timestamps();
    $table->softDeletes();

    $table->index('module_id');
    $table->index('status');
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};
