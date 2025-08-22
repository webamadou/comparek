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
        Schema::create('product_offers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bank_product_id')->constrained()->cascadeOnDelete();

            $table->string('name');       // "Offre Essentielle", "Pack Pro", "Crédit Conso Classic"
            $table->string('slug');       // unique par produit
            $table->text('description')->nullable();

            // Éligibilité / conditions
            $table->decimal('min_income', 14, 2)->nullable();
            $table->unsignedTinyInteger('min_age')->nullable();
            $table->json('required_documents')->nullable(); // ["CNI","Justif. domicile",...]
            $table->json('eligibility')->nullable();        // business rules libres

            // Pour crédits : bornes génériques (détails affinent via rates/fees/features)
            $table->unsignedInteger('min_term_months')->nullable();
            $table->unsignedInteger('max_term_months')->nullable();
            $table->decimal('min_loan_amount', 14, 2)->nullable();
            $table->decimal('max_loan_amount', 14, 2)->nullable();

            // Mise en marché
            $table->date('effective_from')->nullable();
            $table->date('effective_to')->nullable();

            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->unique(['bank_product_id','slug']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_offers');
    }
};
