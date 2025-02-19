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
        Schema::table('employee_identifiers', function (Blueprint $table) {
            $table->enum('type', ['gsis', 'pagibig', 'philhealth', 'sss', 'tin', 'agency'])->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employee_identifiers', function (Blueprint $table) {
            $table->enum('type', ['gsis', 'pag-ibig', 'philhealth', 'sss', 'tin', 'agency'])
                    ->default('gsis')
                    ->change();
        });
    }
};
