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
        // Modify the column type to INTEGER
        Schema::table('educational_backgrounds', function (Blueprint $table) {
            $table->integer('attendance_from')->nullable()->change();
            $table->integer('attendance_to')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('educational_backgrounds', function (Blueprint $table) {
            $table->date('attendance_from')->nullable()->change();
            $table->date('attendance_to')->nullable()->change();
        });
    }
};
