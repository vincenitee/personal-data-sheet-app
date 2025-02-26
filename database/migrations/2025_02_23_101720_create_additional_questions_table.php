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
        Schema::create('additional_questions', function (Blueprint $table) {
            $table->id();

            // Foreign key for PDS Entry
            $table->foreignId('pds_entry_id')
                ->constrained()
                ->onDelete('cascade');

            $table->boolean('has_third_degree_relative')->default(false);
            $table->boolean('has_fourth_degree_relative')->default(false);
            $table->string('fourth_degree_relative', 100)->nullable();

            $table->boolean('has_admin_case')->default(false);
            $table->string('admin_case_details', 100)->nullable();

            $table->boolean('has_criminal_charge')->default(false);
            $table->date('criminal_charge_date')->nullable();
            $table->string('criminal_charge_status', 100)->nullable();

            $table->boolean('has_criminal_conviction')->default(false);
            $table->string('criminal_conviction_details', 100)->nullable();

            $table->boolean('has_separation_from_service')->default(false);
            $table->string('separation_details', 100)->nullable();

            $table->boolean('is_election_candidate')->default(false);
            $table->string('election_details', 100)->nullable();

            $table->boolean('has_resigned_for_election')->default(false);
            $table->string('resignation_details', 100)->nullable();

            $table->boolean('is_immigrant')->default(false);
            $table->string('immigrant_country', 100)->nullable();

            $table->boolean('is_indigenous')->default(false);
            $table->string('indigenous_details', 100)->nullable();

            $table->boolean('is_disabled')->default(false);
            $table->string('disabled_person_id', 100)->nullable();

            $table->boolean('is_solo_parent')->default(false);
            $table->string('solo_parent_id', 100)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('additional_questions');
    }
};
