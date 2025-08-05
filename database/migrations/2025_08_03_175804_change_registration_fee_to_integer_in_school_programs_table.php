<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('school_programs', function (Blueprint $table) {
            $table->unsignedBigInteger('registration_fee_tmp')->default(0)->nullable(true);
        });

        // Copy data to temp column as cents
        DB::statement('UPDATE school_programs SET registration_fee_tmp = ROUND(registration_fee * 100)');

        // Drop original column
        Schema::table('school_programs', function (Blueprint $table) {
            $table->dropColumn('registration_fee');
        });

        // Rename tmp column
        Schema::table('school_programs', function (Blueprint $table) {
            $table->renameColumn('registration_fee_tmp', 'registration_fee');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('school_programs', function (Blueprint $table) {
            $table->decimal('registration_fee_tmp', 10, 2)->default(0.00);
        });

        DB::statement('UPDATE school_programs SET registration_fee_tmp = registration_fee / 100');

        Schema::table('school_programs', function (Blueprint $table) {
            $table->dropColumn('registration_fee');
            $table->renameColumn('registration_fee_tmp', 'registration_fee');
        });
    }
};
