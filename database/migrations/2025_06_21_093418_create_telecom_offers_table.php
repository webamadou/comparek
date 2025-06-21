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
        Schema::create('telecom_offers', function (Blueprint $table) {
            $table->id();

            $table->foreignId('telecom_operator_id')->constrained()->cascadeOnDelete();
            $table->foreignId('telecom_service_type_id')->constrained()->cascadeOnDelete();

            $table->string('name');
            $table->string('slug')->unique();
            $table->string('short_description')->nullable();
            $table->text('detailed_description')->nullable();
            $table->decimal('price_per_month', 10, 2);
            $table->boolean('is_postpaid')->default(false);
            $table->boolean('has_commitment')->default(false);
            $table->integer('commitment_duration_months')->nullable();
            $table->decimal('activation_fee', 10, 2)->nullable();
            $table->string('image_path')->nullable();
            $table->boolean('available_online')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('telecom_offers');
    }
};
