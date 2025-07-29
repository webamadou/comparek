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
            if (!Schema::hasColumn('school_programs', 'registration_fee')) {
                $table->decimal('registration_fee', 8, 2)->default(0)->after('tuition_fee');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('school_programs', function (Blueprint $table) {
            if (Schema::hasColumn('school_programs', 'registration_fee')) {
                $table->dropColumn('registration_fee');
            }
        });
    }
};
