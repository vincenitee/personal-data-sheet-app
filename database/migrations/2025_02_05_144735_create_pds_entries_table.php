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
        Schema::create('pds_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('version')->default(1);
            $table->enum('status', ['draft', 'under_review', 'approved', 'needs_revision'])->default('draft');
            $table->boolean('is_current')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pds_entries', function(Blueprint $table){
            $table->dropForeign('user_id');
        });
        Schema::dropIfExists('pds_entries');
    }
};
