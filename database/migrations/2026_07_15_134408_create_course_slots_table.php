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
        Schema::create('course_slots', function (Blueprint $table) {

            $table->id();

            $table->uuid()->unique();

            $table->foreignId('course_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('training_center_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('title')->nullable();

            $table->date('training_date');

            $table->time('start_time');

            $table->time('end_time');

            $table->unsignedInteger('capacity');

            $table->unsignedInteger('available_seats');

            $table->decimal('price',10,2);

            $table->timestamp('booking_open_at')->nullable();

            $table->timestamp('booking_close_at')->nullable();
 $table->enum('status', ['active', 'inactive'])
                ->default('active');
            $table->text('notes')->nullable();

            $table->foreignId('created_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamps();

            $table->softDeletes();

            $table->index([
                'training_center_id',
                'training_date'
            ]);

            $table->index([
                'course_id',
                'status'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_slots');
    }
};
