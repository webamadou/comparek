<?php

use App\Enums\BankCategory;
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
        Schema::create('banks', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->string('slug')->unique();
            $table->string('logo_path')->nullable();
            $table->string('website_url')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();

            $table->string('country_code', 4)->default('SN'); // ISO-3166-1 alpha-2
            $table->string('swift_bic')->nullable();
            $table->string('regulatory_license')->nullable(); // n° agrément BCEAO/MF

            $table->string('headquarters_location')->nullable();
            $table->year('established_year')->nullable();

            $table->string('category')->default(BankCategory::BANK->value); // enum string
            $table->boolean('is_active')->default(true);

            $table->text('description')->nullable();
            $table->json('metadata')->nullable(); // champs libres (réseaux sociaux, etc.)

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banks');
    }
};
