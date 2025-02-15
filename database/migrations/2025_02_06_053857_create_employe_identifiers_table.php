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
        Schema::create('employe_identifiers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personal_information_id')
                ->constrained('personal_information')
                ->onDelete('cascade');
            $table->enum('type', ['gsis', 'sss', 'tin', 'pag-ibig', 'philhealth', 'agency']);
            $table->string('number', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employe_identifiers');
    }
};
