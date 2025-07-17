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
        Schema::create('school_programs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('school_id')->constrained()->cascadeOnDelete();
            $table->foreignId('program_domain_id')->nullable()->constrained('program_domains')->nullOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('level');
            $table->unsignedTinyInteger('duration_years')->nullable();
            $table->string('modality')->nullable();
            $table->string('language')->nullable();
            $table->boolean('is_accredited')->default(false);
            $table->integer('tuition_fee')->nullable();
            $table->string('tuition_currency')->default('FCFA');
            $table->text('tuition_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_programs');
    }
};
