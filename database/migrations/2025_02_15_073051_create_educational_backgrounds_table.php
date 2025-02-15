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
        Schema::create('educational_backgrounds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pds_entry_id')->constrained()->cascadeOnDelete();
            $table->enum('level', ['elementary', 'secondary', 'vocational', 'college', 'graduate_studies']);
            $table->string('school_name', 100)->nullable();
            $table->string('degree_earned', 100)->nullable();
            $table->date('attendance_from')->nullable();
            $table->date('attendance_end')->nullable();
            $table->decimal('level_unit_earned', 8, 2)->nullable();
            $table->integer('year_graduated')->nullable();
            $table->string('academic_honors', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('educational_backgrounds');
    }
};
