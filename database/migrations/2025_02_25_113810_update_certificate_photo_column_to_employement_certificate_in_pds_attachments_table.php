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
        Schema::table('pds_attachments', function (Blueprint $table) {
            $table->renameColumn('certificate_photo', 'employement_certificate')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pds_attachments', function (Blueprint $table) {
            //
            $table->renameColumn('employement_certificate', 'certificate_photo')->change();
        });
    }
};
