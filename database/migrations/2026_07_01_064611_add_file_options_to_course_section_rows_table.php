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
        Schema::table('course_section_rows', function (Blueprint $table) {
            $table->boolean('is_downloadable')->default(true)->after('data');
            $table->boolean('is_document_submission')->default(true)->after('is_downloadable');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('course_section_rows', function (Blueprint $table) {
            $table->dropColumn([
                'is_downloadable',
                'is_document_submission',
            ]);
        });
    }
};
