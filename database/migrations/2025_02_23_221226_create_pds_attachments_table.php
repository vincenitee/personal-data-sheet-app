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
        Schema::create('pds_attachments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('pds_entry_id')
                ->constrained()
                ->onDelete('cascade');

            $table->string('passport_photo')->nullable();

            $table->string('right_thumbmark_photo')->nullable();

            $table->string('government_id_type')->nullable();

            $table->string('government_id_no', 30)->nullable();

            $table->string('government_id_photo')->nullable();

            $table->string('signature_photo')->nullable();

            $table->string('otr_photo')->nullable();

            $table->string('diploma_photo')->nullable();

            $table->string('certificate_photo')->nullable();

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pds_attachments');
    }
};
