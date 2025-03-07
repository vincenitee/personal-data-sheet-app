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
        Schema::table('pds_entries', function (Blueprint $table) {
            if (Schema::hasColumn('pds_entries', 'version')) {
                $table->dropColumn('version');
            }
        });

        Schema::table('submissions', function (Blueprint $table) {
            if (Schema::hasColumn('submissions', 'version')) {
                $table->dropColumn('version');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pds_entries', function (Blueprint $table) {
            $table->unsignedInteger('version')->default(0)->after('user_id');
        });

        Schema::table('submissions', function (Blueprint $table) {
            $table->unsignedInteger('version')->default(0)->after('pds_entry_id');
        });
    }
};
