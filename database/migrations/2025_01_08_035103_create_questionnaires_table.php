<?php

use App\Models\Employee;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('questionnaires', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Employee::class)
                ->constrained()
                ->cascadeOnDelete();

            $table->boolean('has_third_degree_relative')->default(false);
            $table->text('third_degree_details')->nullable();

            $table->boolean('has_fourth_degree_relative')->default(false);
            $table->text('fourth_degree_details')->nullable();

            $table->boolean('has_admin_case')->default(false);
            $table->text('admin_case_details')->nullable();

            $table->boolean('has_criminal_charge')->default(false);
            $table->date('criminal_charge_date')->nullable();
            $table->string('criminal_charge_status')->nullable();

            $table->boolean('has_criminal_conviction')->default(false);
            $table->text('criminal_conviction_details')->nullable();

            $table->boolean('has_separation_from_service')->default(false);
            $table->text('separation_details')->nullable();

            $table->boolean('is_election_candidate')->default(false);
            $table->text('election_details')->nullable();

            $table->boolean('has_resigned_for_election')->default(false);
            $table->text('resignation_details')->nullable();

            $table->boolean('is_immigrant')->default(false);
            $table->string('immigrant_country', 10)->nullable();

            $table->foreign('immigrant_country')
                ->on('countries')
                ->references('id')
                ->cascadeOnDelete();

            $table->boolean('is_indigenous')->default(false);
            $table->text('indegenous_details')->nullable();

            $table->boolean('is_disabled')->default(false);
            $table->string('pwd_id_no', 20)->nullable();

            $table->boolean('is_solo_parent')->default(false);
            $table->string('solo_parent_id_no', 20)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questionnaires');
    }
};
