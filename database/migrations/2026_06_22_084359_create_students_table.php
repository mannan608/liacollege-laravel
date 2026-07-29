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
        
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->string('student_id')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('usi')->nullable();

            // Contact Information
            $table->string('alternate_email')->nullable();
            $table->string('home_phone_country', 10)->nullable();
            $table->string('home_phone', 50)->nullable();
            $table->string('work_phone_country', 10)->nullable();
            $table->string('work_phone', 50)->nullable();
            $table->string('mobile_phone_country', 10)->nullable();
            $table->string('mobile_phone', 50)->nullable();

            // Identity & Cultural Background
            $table->string('title', 20)->nullable();
            $table->string('first_name', 100)->nullable();
            $table->string('middle_name', 100)->nullable();
            $table->string('last_name', 100)->nullable();
            $table->string('name_commonly_known_as', 100)->nullable();
            $table->string('gender', 20)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('country_of_birth', 100)->nullable();
            $table->string('city_of_birth', 100)->nullable();
            $table->string('indigenous_status', 50)->nullable();
            $table->string('citizenship_status', 50)->nullable();
            $table->string('main_language_spoken_at_home', 50)->nullable();
            $table->boolean('has_disability')->default(false);
            $table->text('disability_description')->nullable();

            // Residential Address
            $table->string('residential_unit_no', 20)->nullable();
            $table->string('residential_building_name', 100)->nullable();
            $table->string('residential_street_no', 20)->nullable();
            $table->string('residential_street_name', 100)->nullable();
            $table->string('residential_city', 100)->nullable();
            $table->string('residential_state', 100)->nullable();
            $table->string('residential_post_code', 20)->nullable();
            $table->string('residential_country', 100)->default('Australia');

            // Postal Address
            $table->boolean('postal_same_as_residential')->default(false);
            $table->string('postal_unit_no', 20)->nullable();
            $table->string('postal_building_name', 100)->nullable();
            $table->string('postal_street_no', 20)->nullable();
            $table->string('postal_street_name', 100)->nullable();
            $table->string('postal_po_box', 50)->nullable();
            $table->string('postal_city', 100)->nullable();
            $table->string('postal_state', 100)->nullable();
            $table->string('postal_post_code', 20)->nullable();
            $table->string('postal_country', 100)->nullable();

            // Education & Employment
            $table->boolean('attending_secondary_school')->nullable();
            $table->string('school_type', 50)->nullable();
            $table->string('highest_school_level', 50)->nullable();
            $table->string('school_completion_year', 10)->nullable();
            $table->json('qualifications_completed')->nullable();
            $table->string('employment_status', 50)->nullable();
            $table->string('industry', 100)->nullable();
            $table->string('occupation_category', 100)->nullable();
            $table->string('reason_for_course', 100)->nullable();
            $table->boolean('ncver_consent')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
