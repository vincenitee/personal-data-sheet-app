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
        Schema::table('educational_backgrounds', function (Blueprint $table) {
            $table->renameColumn('attendance_end', 'attendance_to');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('educational_backgrounds', function (Blueprint $table) {
            $table->renameColumn('attendance_to', 'attendance_end');
        });
    }
};
