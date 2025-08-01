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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('canonical_url')->nullable();
            $table->text('excerpt')->nullable();
            $table->longText('content');
            $table->boolean('is_published')->default(false);
            $table->dateTime('published_at')->nullable();
            $table->json('schema_json')->nullable();
            $table->string('robots_directives')->nullable();
            $table->foreignId('author_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('category_id')->nullable()->comment('Telecom, Ecole, Bank...')->constrained('categories')->nullOnDelete();
            $table->foreignId('subject_id')->nullable()->constrained('categories')->nullOnDelete();
            $table->unsignedBigInteger('views_count')->default(0);
            $table->unsignedTinyInteger('reading_time_minutes')->nullable();
            $table->integer('is_home_page_big_image')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
