<?php

use App\Models\Barangay;
use App\Models\Employee;
use App\Models\Province;
use App\Models\Municipality;
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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Employee::class)
                ->constrained()
                ->cascadeOnDelete();

            $table->enum('type', ['residential', 'permanent']);

            $table->bigInteger('province_id');
            $table->bigInteger('municipality_id');
            $table->bigInteger('barangay_id');

            $table->string('subdivision', 50);
            $table->string('street', 20);
            $table->string('house_no', 20);

            $table->integer('zip_code');

            $table->timestamps();

            $table->foreign('province_id')
                ->on('provinces')
                ->references('id')
                ->cascadeOnDelete();

            $table->foreign('municipality_id')
                ->on('municipalities')
                ->references('id')
                ->cascadeOnDelete();

            $table->foreign('barangay_id')
                ->on('barangays')
                ->references('id')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
