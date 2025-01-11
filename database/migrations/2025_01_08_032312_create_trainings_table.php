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
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Employee::class)
                ->constrained()
                ->cascadeOnDelete();

            $table->string('title', 100);
            $table->date('date_started');
            $table->date('date_ended')->nullable();
            $table->decimal('total_hours', 5, 2);

            $table->enum('type', ['managerial', 'foundation', 'technical', 'supervisory']);
            $table->string('sponsor', 100);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainings');
    }
};
