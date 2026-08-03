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
            $table->foreignId('course_permission_role_id')
                ->constrained('course_permission_roles')
                ->cascadeOnDelete();

            $table->morphs('permissionable');

            $table->timestamps();

            $table->unique([
                'course_permission_role_id',
                'permissionable_type',
                'permissionable_id'
            ], 'role_permission_unique');
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
