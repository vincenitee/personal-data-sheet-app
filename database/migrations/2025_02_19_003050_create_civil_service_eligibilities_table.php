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
        Schema::create('civil_service_eligibilities', function (Blueprint $table) {
            $table->id();

            // Foreign key for PDS Entry
            $table->foreignId('pds_entry_id')
                ->constrained()
                ->onDelete('cascade');

            // Eligibility Information
            $table->string('career_service')->nullable();
            $table->decimal('ratings', 4, 2)->nullable();
            $table->date('exam_date')->nullable();
            $table->string('exam_place', 100)->nullable();
            $table->string('license_number', 20)->nullable();
            $table->date('license_validity')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('civil_service_eligibilities');
    }
};
