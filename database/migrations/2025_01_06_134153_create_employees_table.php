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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 20);
            $table->string('middle_name', 20)->nullable(); // Nullable for incomplete data
            $table->string('last_name', 20);
            $table->string('suffix', 10)->nullable(); // Nullable for optional suffix
            $table->date('birthdate')->nullable(); // Nullable for incomplete profiles
            $table->string('birthplace', 100)->nullable(); // Nullable for later input
            $table->enum('sex', ['male', 'female', 'others'])->nullable(); // Nullable to allow later input
            $table->enum('civil_status', ['single', 'married', 'separated', 'divorced', 'widowed'])->nullable();
            $table->decimal('height', 5, 2)->nullable();
            $table->decimal('weight', 6, 2)->nullable();
            $table->enum('blood_type', ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'])->nullable();
            $table->string('telephone_no', 15)->nullable();
            $table->string('mobile_no', 15)->nullable();
            $table->string('email')->unique(); // Email remains required for signup
            $table->string('password'); // Add a password field for authentication
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending'); // Signup status
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
