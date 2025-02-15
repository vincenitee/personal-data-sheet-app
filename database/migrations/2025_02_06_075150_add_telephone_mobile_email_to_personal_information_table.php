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
            $table->string('telephone_no', 20)
                ->nullable()
                ->after('country_id');
            $table->integer('mobile_no')
                ->nullable()
                ->after('telephone_no');
            $table->string('email', 100)
                ->nullable()
                ->after('mobile_no');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('personal_information', function (Blueprint $table) {
            $table->dropColumn(['telephone_no', 'mobile_no', 'email']);
        });
    }
};
