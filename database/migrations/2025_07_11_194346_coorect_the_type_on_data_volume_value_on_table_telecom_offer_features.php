
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
        // rename old column
        Schema::table('telecom_offer_features', function (Blueprint $table) {
            $table->renameColumn('data_volume_value', 'data_volume_value_old');
        });
        // recreate column with correct type
        Schema::table('telecom_offer_features', function (Blueprint $table) {
            $table->decimal('data_volume_value', 10, 2)->nullable()->after('data_volume_value_old');
        });

        // Migrate data
        DB::statement("
            UPDATE telecom_offer_features
            SET data_volume_value = CAST(data_volume_value_old AS DECIMAL(10,2))
            WHERE data_volume_value_old REGEXP '^[0-9]+(\.[0-9]+)?$'
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('telecom_offer_features', function (Blueprint $table) {
            // Drop the new column
            $table->dropColumn('data_volume_value');
        });

        Schema::table('telecom_offer_features', function (Blueprint $table) {
            // Rename old column back
            $table->renameColumn('data_volume_value_old', 'data_volume_value');
        });
    }
};
