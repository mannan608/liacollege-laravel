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
        Schema::create('course_permissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('permission_role_id')->constrained('course_permission_roles')->onDelete('cascade');
            $table->enum('entity_type', ['category', 'section', 'row']);
            $table->unsignedBigInteger('entity_id');
            $table->timestamps();

            // Prevent duplicate entries
            $table->unique(['permission_role_id', 'entity_type', 'entity_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_permissions');
    }
};
