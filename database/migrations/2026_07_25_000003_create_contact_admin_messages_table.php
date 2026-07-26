<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contact_admin_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('message');
            $table->string('recognised_code')->nullable();
            $table->string('course_title')->nullable();
            $table->string('year_enrolled')->nullable();
            $table->string('status')->default('pending');
            $table->text('admin_notes')->nullable();
            $table->text('admin_reply')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_admin_messages');
    }
};
