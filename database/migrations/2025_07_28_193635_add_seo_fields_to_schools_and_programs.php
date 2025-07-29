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
        Schema::table('schools_and_programs', function (Blueprint $table) {
            if (! Schema::hasColumn('schools_and_programs', 'seo_text')) {
                Schema::table('schools', function (Blueprint $table) {
                    $table->string('meta_title')->nullable()->after('country');
                    $table->text('meta_description')->nullable()->after('meta_title');
                    $table->text('seo_keywords')->nullable()->after('meta_description');
                });
            }

            if (! Schema::hasColumn('schools_and_programs', 'meta_title')) {
                Schema::table('school_programs', function (Blueprint $table) {
                    $table->string('meta_title')->nullable()->after('tuition_description');
                    $table->text('meta_description')->nullable()->after('meta_title');
                    $table->text('seo_keywords')->nullable()->after('meta_description');
                });
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('schools_and_programs', function (Blueprint $table) {
            if (Schema::hasColumn('schools_and_programs', 'meta_title')) {
                $table->dropColumn('meta_title');
                $table->dropColumn('meta_description');
                $table->dropColumn('seo_keywords');
            }
        });
    }
};
