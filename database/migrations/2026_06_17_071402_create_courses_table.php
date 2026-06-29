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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('code')->nullable();
            $table->string('cricos')->nullable();
            $table->string('slug')->unique();

            $table->decimal('price', 10, 2)->default(0);
            $table->unsignedTinyInteger('discount_percentage')->default(0);

            $table->string('thumbnail')->nullable();
            $table->longText('overview')->nullable();
            $table->longText('entry_requirements')->nullable();
            $table->longText('description')->nullable();
            // PDF, DOC, ZIP, etc
            $table->string('course_material')->nullable();
             $table->enum('status', ['active', 'inactive'])
                ->default('active');
            $table->foreignId('category_id')->nullable();
            $table->foreignId('created_by')->nullable();
            $table->foreignId('updated_by')->nullable();
           

            $table->timestamps();
            $table->softDeletes();

            $table->index('category_id');
            $table->index('slug');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
