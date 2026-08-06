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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();

            // Polymorphic relationship
            $table->morphs('documentable');

            // Document information
            $table->string('name');
            $table->string('document_type')->nullable();
             $table->foreignId('course_id')->nullable()->after('documentable_id')->constrained()->nullOnDelete();
            $table->string('file');
            $table->string('extension')->nullable();
            $table->unsignedBigInteger('size')->nullable();
            $table->text('notes')->nullable();

            // User who uploaded the document
            $table->foreignId('uploaded_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};