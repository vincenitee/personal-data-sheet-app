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
        Schema::create('voluntary_work_experiences', function (Blueprint $table) {
            $table->id();

            // Foreign key for PDS Entry
            $table->foreignId('pds_entry_id')
                ->constrained()
                ->onDelete('cascade');

            $table->string('position', 50)->nullable();
            $table->string('organization_name', 50)->nullable();
            $table->string('organization_address', 50)->nullable();
            $table->date('date_from')->nullable();
            $table->date('date_to')->nullable();
            $table->unsignedInteger('total_hours')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voluntary_work_experiences');
    }
};
