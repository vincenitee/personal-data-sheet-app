<?php

use App\Enums\PdsSections;
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
        Schema::create('submission_comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('submission_id')
                ->constrained()
                ->onDelete('cascade');

            $table->foreignId('admin_id')
                ->constrained('users')
                ->onDelete('cascade');

            $table->enum('section', PdsSections::values());
            $table->text('comment');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submission_comments');
    }
};
