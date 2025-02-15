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
        Schema::create('employee_parents', function (Blueprint $table) {
            $table->id();

            // Foreign key for PDS Entry
            $table->foreignId('pds_entry_id')
                ->constrained()
                ->onDelete('cascade');

            $table->enum('relationship', ['mother', 'father']);

            // Father's Information
            $table->string('firstname', 50);
            $table->string('middlename', 50)->nullable();
            $table->string('lastname', 50);
            $table->string('suffix', 10)->nullable();

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_parents');
    }
};
