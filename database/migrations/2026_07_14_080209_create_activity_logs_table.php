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
        Schema::create('activity_logs', function (Blueprint $table) {

            $table->id();

            // User Information
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('user_name')->nullable();

            // Action Information
            $table->string('action', 100);
            $table->string('module', 100);

            // Related Record
            $table->unsignedBigInteger('record_id')->nullable();
            $table->string('record_type')->nullable();

            // Description
            $table->text('description')->nullable();

            // Before / After Data
            $table->json('old_values')->nullable();
            $table->json('new_values')->nullable();

            // Request Information
            $table->string('url', 500)->nullable();
            $table->string('method', 20)->nullable();

            // Device Information
            $table->string('ip_address', 100)->nullable();
            $table->text('user_agent')->nullable();
            $table->string('browser')->nullable();
            $table->string('platform')->nullable();
            $table->string('device_type')->nullable();

            // Status
            $table->enum('status', ['success', 'failed'])
                ->default('success');

            $table->timestamps();

            // Indexes
            $table->index('user_id');
            $table->index('module');
            $table->index('action');
            $table->index('record_id');
            $table->index('status');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_logs');
    }
};
