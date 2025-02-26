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
        Schema::create('reference_people', function (Blueprint $table) {
            $table->id();

            $table->foreignId('additional_question_id')
                ->constrained('additional_questions')
                ->onDelete('cascade');

            $table->string('fullname', 50);

            $table->string('address', 100)->nullable();

            $table->string('telephone_no', 20)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reference_people');
    }
};
