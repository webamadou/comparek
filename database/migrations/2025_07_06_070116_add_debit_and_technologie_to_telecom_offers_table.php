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
        Schema::table('telecom_offers', function (Blueprint $table) {
            if (! Schema::hasColumn('telecom_offers', 'debit')) {
                $table->integer('debit')->nullable();
                $table->string('debit_unit', 5)->nullable();
            }

             if (! Schema::hasColumn('telecom_offers', 'technology')) {
                $table->string('technology')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('telecom_offers', function (Blueprint $table) {
             if (Schema::hasColumn('telecom_offers', 'debit')) {
                $table->dropColumn('debit');
                $table->dropColumn('debit_unit');
            }

             if (Schema::hasColumn('telecom_offers', 'technology')) {
                $table->dropColumn('technology');
            }
        });
    }
};
