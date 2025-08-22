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
        Schema::create('product_interest_rates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_offer_id')->constrained()->cascadeOnDelete();

            $table->string('rate_type'); // enum RateType
            $table->decimal('value_percent', 7, 4); // ex: 12.5000 (%)
            $table->boolean('is_fixed')->default(true);
            $table->string('reference_index')->nullable(); // ex: "BCEAO base", "custom"
            $table->decimal('spread_percent', 6, 4)->nullable(); // si variable = index + spread
            $table->json('conditions')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_interest_rates');
    }
};
