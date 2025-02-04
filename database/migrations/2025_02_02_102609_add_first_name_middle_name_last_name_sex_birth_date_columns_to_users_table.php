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
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name', 20)->after('id');
            $table->string('middle_name', 20)->nullable()->after('first_name');
            $table->string('last_name', 20)->after('middle_name');
            $table->string('sex', 10)->after('last_name');
            $table->date('birth_date')->after('sex');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'first_name',
                'middle_name',
                'last_name',
                'sex',
                'birth_date'
            ]);
        });
    }
};
