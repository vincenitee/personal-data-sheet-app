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
        Schema::table('countries', function (Blueprint $table) {
            $table->dropPrimary();

            $table->string('id', 10)->change();

            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('countries', function (Blueprint $table) {
            // Drop the primary key
            $table->dropPrimary();

            // Change back to the original data type (if needed)
            $table->integer('id')->change(); // Assuming the original type was integer

            // Re-add the primary key
            $table->primary('id');
        });
    }
};
