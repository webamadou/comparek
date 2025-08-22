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
        Schema::create('product_features', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_offer_id')->constrained()->cascadeOnDelete();

            $table->string('key');   // ex: "mobile_app","internet_banking","ussd","visa","mastercard","contactless"
            $table->string('type')->default('bool'); // bool|string|number
            $table->string('value_string')->nullable();
            $table->decimal('value_number', 14, 2)->nullable();
            $table->boolean('value_bool')->nullable();
            $table->json('meta')->nullable(); // infos supplémentaires

            $table->timestamps();
            $table->unique(['product_offer_id','key']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_features');
    }
};
