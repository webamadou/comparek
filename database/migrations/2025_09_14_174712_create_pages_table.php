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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('locale', 8)->default('fr');                 // multi-lang friendly
            $table->string('name', 180);
            $table->string('slug', 200);
            $table->string('excerpt', 255)->nullable();                 // short summary (SERP snippet helper)
            $table->longText('body')->nullable();                       // main HTML/Markdown
            $table->string('template', 80)->nullable();                 // e.g., 'default', 'landing', 'legal'
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');
            $table->timestamp('published_at')->nullable();

            // SEO
            $table->string('meta_title', 180)->nullable();
            $table->string('meta_description', 255)->nullable();
            $table->json('meta_keywords')->nullable();                  // array of strings
            $table->string('meta_robots', 50)->default('index,follow'); // typical combos
            $table->string('canonical_url', 255)->nullable();

            // Social cards
            $table->string('og_title', 180)->nullable();
            $table->string('og_description', 255)->nullable();
            $table->string('og_image_path', 255)->nullable();
            $table->string('twitter_card', 20)->nullable();             // summary / summary_large_image

            // Structured data
            $table->json('schema_json')->nullable();

            // Author & audits
            $table->foreignId('author_id')->nullable()->constrained('users')->nullOnDelete();
            $table->integer('cannot_delete')->default(0); // safeguard important pages
            $table->softDeletes();

            // Indexing & uniqueness
            $table->unique(['locale', 'slug']);
            $table->index(['status', 'published_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
