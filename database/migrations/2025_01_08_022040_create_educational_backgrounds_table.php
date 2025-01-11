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
        Schema::create('educational_backgrounds', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Employee::class)
                ->constrained()
                ->cascadeOnDelete();

            $table->enum('level', ['elementary', 'secondary', 'vocational', 'college', 'graduate_studies']);

            $table->string('school_name', 100);

            $table->string('degree', 100)->nullable();

            $table->year('year_started');
            $table->year('year_ended')->nullable();
            $table->year('year_graduated')->nullable();

            $table->string('honors_received', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('educational_backgrounds');
    }
};
