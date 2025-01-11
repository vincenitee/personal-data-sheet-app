<?php

use App\Models\FamilyMember;
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
        Schema::create('spouses', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(FamilyMember::class)
                ->constrained()
                ->cascadeOnDelete();

            $table->string('occupation', 100);
            $table->string('business_name', 50);
            $table->string('business_address', 100);
            $table->string('telephone_no', 15);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spouses');
    }
};
