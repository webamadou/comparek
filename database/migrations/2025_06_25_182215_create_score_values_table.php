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
        Schema::create('score_values', function (Blueprint $table) {
            $table->id();
            $table->foreignId('score_criteria_id')->constrained()->cascadeOnDelete();
            $table->string('vertical_entity_type');
            $table->unsignedBigInteger('vertical_entity_id');
            $table->float('value');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('score_values');
    }
};
