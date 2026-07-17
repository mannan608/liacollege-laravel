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
                ->constrained()
                ->cascadeOnDelete();

            $table->string('title');

            $table->enum('resource_type', [
                'video',
                'content',
                'file',
                'quiz'
            ]);

            /*
    video = youtube url / vimeo url

    content = html/text

    file = pdf/doc/ppt

    quiz = quiz_id
    */

            $table->text('description')->nullable();

            $table->string('url')->nullable();

            $table->string('file_path')->nullable();

            $table->foreignId('quiz_id')
                ->nullable()
                ->constrained('quizzes')
                ->nullOnDelete();

            $table->integer('sort_order')
                ->default(0);

            $table->boolean('status')
                ->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lesson_resources');
    }
};
