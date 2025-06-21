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
        Schema::table('telecom_offer_features', function (Blueprint $table) {
            // Rename existing columns
            $table->renameColumn('value', 'data_volume_value');
            $table->renameColumn('unit', 'data_volume_unit');

            // Add new columns
            $table->integer('voice_minutes')->nullable();
            $table->integer('sms_nbr')->nullable();
            $table->decimal('internet_speed_value', 10, 2)->nullable();
            $table->string('internet_speed_unit')->nullable();
            $table->integer('nbr_tv')->nullable();
            $table->integer('validity_length')->nullable();
        });

        Schema::table('telecom_offer_features', function (Blueprint $table) {
            // Change nullability after renaming
            $table->string('data_volume_value')->nullable()->change();
            $table->string('data_volume_unit')->nullable()->change();
            $table->string('name')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('telecom_offer_features', function (Blueprint $table) {
            $table->renameColumn('data_volume_value', 'value');
            $table->renameColumn('data_volume_unit', 'unit');

            $table->dropColumn([
                'voice_minutes',
                'sms_nbr',
                'internet_speed_value',
                'internet_speed_unit',
                'nbr_tv',
                'validity_length',
            ]);
        });
    }
};
