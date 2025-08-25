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
        Schema::create('product_fees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_offer_id')->constrained()->cascadeOnDelete();

            $table->string('fee_type'); // enum FeeType
            $table->string('unit');     // enum FeeUnit

            // montant absolu en XOF si applicable
            $table->decimal('amount', 14, 2)->nullable();
            // pourcentage si applicable (0-100)
            $table->decimal('percentage', 7, 4)->nullable();
            // bornes pour frais variables
            $table->decimal('min_amount', 14, 2)->nullable();
            $table->decimal('max_amount', 14, 2)->nullable();

            // conditions: "gratuite 6 premiers mois", "réduction salaire domicilié", paliers, etc.
            $table->json('conditions')->nullable();

            $table->timestamps();
            $table->unique(['product_offer_id','fee_type','unit']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_fees');
    }
};
