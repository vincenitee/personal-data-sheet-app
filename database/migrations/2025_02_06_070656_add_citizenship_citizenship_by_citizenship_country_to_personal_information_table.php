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
        Schema::table('personal_information', function (Blueprint $table) {
            $table->enum('citizenship', ['filipino', 'dual'])
                ->after('blood_type')
                ->nullable();

            $table->enum('citizenship_by', ['birth', 'naturalization'])
                ->after('citizenship')
                ->nullable();

            $table->string('country_id', 5)
                ->after('citizenship_by')
                ->nullable();

            $table->foreign('country_id')
                ->nullable()
                ->references('id')
                ->on('countries')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('personal_information', function (Blueprint $table) {
            $table->dropForeign(['country_id']);
            $table->dropColumn(['citizenship', 'citizenship_by', 'country_id']);
        });
    }
};
