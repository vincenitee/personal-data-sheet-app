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
        Schema::table('employee_parents', function (Blueprint $table) {
            $table->renameColumn('firstname', 'first_name');
            $table->renameColumn('middlename', 'middle_name');
            $table->renameColumn('lastname', 'last_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employee_parents', function (Blueprint $table) {
            $table->renameColumn('first_name', 'firstname');
            $table->renameColumn('middle_name', 'middlename');
            $table->renameColumn('last_name', 'lastname');
        });
    }
};
