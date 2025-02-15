<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('personal_information', function (Blueprint $table) {
            // Drop the foreign key constraint before modifying the column
            $table->dropForeign(['country_id']);
            $table->dropColumn('country_id');

            // Add the new column
            $table->string('country', 100)->nullable()->after('citizenship_by');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('personal_information', function (Blueprint $table) {
            // Remove the newly added column
            $table->dropColumn('country');

            // Recreate the country_id column and foreign key
            $table->string('country_id', 5)->nullable()->after('citizenship_by');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('set null');
        });
    }
};

