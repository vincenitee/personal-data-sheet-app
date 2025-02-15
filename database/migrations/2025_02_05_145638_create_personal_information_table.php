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
        Schema::create('personal_information', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pds_entry_id')->constrained()->onDelete('cascade');
            $table->string('first_name', 20);  // Required
            $table->string('middle_name', 20)->nullable();  // Nullable, optional field
            $table->string('last_name', 20);  // Required
            $table->string('suffix', 10)->nullable();  // Nullable, optional field
            $table->date('birth_date');  // Required
            $table->string('birth_place')->nullable();  // Nullable, optional field
            $table->enum('sex', ['male', 'female'])->nullable();  // Nullable, optional field
            $table->enum('civil_status', ['single', 'married', 'widowed', 'divorced', 'separated', 'annulled'])
                ->default('single')
                ->nullable();  // Nullable, optional field
            $table->decimal('height', 5, 2)->nullable();  // Nullable, optional field
            $table->decimal('weight', 5, 2)->nullable();  // Nullable, optional field
            $table->enum('blood_type', ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'])->nullable();  // Nullable, optional field
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('personal_information', function(Blueprint $table){
            $table->dropForeign('pds_entry_id');
        });
        Schema::dropIfExists('personal_information');
    }
};
