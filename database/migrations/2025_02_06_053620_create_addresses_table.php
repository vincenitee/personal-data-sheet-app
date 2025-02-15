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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();

            // Foreign key references with nullable options
            $table->foreignId('personal_information_id')
                ->nullable()
                ->constrained('personal_information')
                ->onDelete('cascade');

            // Address type with default value and nullable
            $table->enum('address_type', ['permanent', 'residential'])->default('permanent')->nullable();

            // Nullable foreign key references for draft save
            $table->foreignId('region_id')
                ->nullable()
                ->constrained()
                ->onDelete('cascade');

            $table->foreignId('province_id')
                ->nullable()
                ->constrained()
                ->onDelete('cascade');

            $table->foreignId('municipality_id')
                ->nullable()
                ->constrained()
                ->onDelete('cascade');

            $table->foreignId('barangay_id')
                ->nullable()
                ->constrained()
                ->onDelete('cascade');

            // Nullable address fields
            $table->string('subdivision', 50)->nullable();
            $table->string('street', 50)->nullable();
            $table->string('house_no', 50)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
