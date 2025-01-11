<?php

use App\Models\Employee;
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
        Schema::create('work_experiences', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Employee::class)
                ->constrained()
                ->cascadeOnDelete();

            $table->string('position', 100);
            $table->string('department', 100);
            $table->date('date_started');
            $table->date('date_ended')->nullable();

            $table->decimal('monthly_salary', 10, 2);
            $table->unsignedTinyInteger('salary_grade')->nullable();
            $table->unsignedTinyInteger('salary_step')->nullable();

            $table->enum('status', ['permanent', 'contractual', 'job_order', 'casual'])
                ->default('permanent');
            $table->boolean('government_service')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_experiences');
    }
};
