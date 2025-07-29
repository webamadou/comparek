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
        Schema::table('school_programs', function (Blueprint $table) {
            if (Schema::hasColumn('school_programs', 'program_domain_id')) {
                $table->dropForeign(['program_domain_id']); // ou $table->dropForeign('school_programs_program_domain_id_foreign');
                $table->dropColumn('program_domain_id');
            }
        });

        Schema::create('program_domain_school_program', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_program_id')->constrained()->cascadeOnDelete();
            $table->foreignId('program_domain_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_domain_school_program');
    }
};
