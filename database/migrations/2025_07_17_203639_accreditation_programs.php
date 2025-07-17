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
        Schema::create('accreditation_programs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('school_program_id')->constrained()->cascadeOnDelete();
            $table->foreignId('accreditation_body_id')->constrained()->cascadeOnDelete();

            $table->integer('status')->nullable()->default(0)->comment("1=pending;2=validated;3=expired");
            $table->date('accreditation_date')->nullable();
            $table->date('expiration_date')->nullable();
            $table->text('notes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accreditation_programs');
    }
};
