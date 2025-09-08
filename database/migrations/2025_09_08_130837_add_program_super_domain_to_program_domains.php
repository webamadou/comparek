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
        Schema::table('program_domains', function (Blueprint $table) {
            $table->foreignId('super_domain_id')
                ->nullable()
                ->constrained('program_super_domains')
                ->nullOnDelete()
                ->after('slug');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('program_domains', function (Blueprint $table) {
            $table->dropConstrainedForeignId('super_domain_id');
        });
    }
};
