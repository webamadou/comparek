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
        Schema::create('bank_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bank_id')->constrained()->cascadeOnDelete();

            $table->string('name');         // "Compte Courant", "Épargne Classique", "Crédit Immo", ...
            $table->string('slug');
            $table->string('product_type'); // enum string ProductType
            $table->string('currency', 3)->default('XOF');

            // Champs génériques utiles (spécifiques détaillés en offer/features)
            $table->boolean('is_active')->default(true);
            $table->text('description')->nullable();

            $table->timestamps();
            $table->unique(['bank_id','slug']);
            $table->index(['bank_id','product_type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_products');
    }
};
