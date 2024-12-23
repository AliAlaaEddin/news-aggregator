<?php

use App\Definitions\ArticleDefinition;
use App\Definitions\AuthorDefinition;
use App\Definitions\BaseDefinition;
use App\Definitions\Pivots\AuthorArticleDefinition;
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
        Schema::create(AuthorArticleDefinition::TABLE_NAME, function (Blueprint $table) {
            $table->id();

            $table->foreignUuid(AuthorArticleDefinition::AUTHOR_ID)
                ->references(BaseDefinition::ID)
                ->on(AuthorDefinition::TABLE_NAME)
                ->cascadeOnDelete();

            $table->foreignUuid(AuthorArticleDefinition::ARTICLE_ID)
                ->references(BaseDefinition::ID)
                ->on(ArticleDefinition::TABLE_NAME)
                ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(AuthorArticleDefinition::TABLE_NAME);
    }
};
