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
        Schema::create('work_experiences', function (Blueprint $table) {
            $table->id();

            // Foreign key for PDS Entry
            $table->foreignId('pds_entry_id')
                ->constrained()
                ->onDelete('cascade');

            $table->string('position', 100)->nullable();
            $table->string('agency', 100)->nullable(); // Renamed for clarity
            $table->decimal('salary', 10, 2)->nullable();
            $table->integer('salary_grade')->nullable(); // Removed duplicate
            $table->integer('salary_step')->nullable(); // Added missing salary step

            $table->enum('status', [
                'permanent',
                'contractual',
                'casual',
                'contract_of_service',
                'temporary'
            ])->nullable();

            $table->boolean('government_service')->default(true); // Removed nullable()

            $table->date('date_from')->nullable();
            $table->date('date_to')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_experiences');
    }
};
