<?php

use App\Definitions\ArticleDefinition;
use App\Definitions\AuthorDefinition;
use App\Definitions\BaseDefinition;
use App\Definitions\CategoryDefinition;
use App\Definitions\SourceDefinition;
use App\Enums\NewsProvidersEnum;
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
        Schema::create(ArticleDefinition::TABLE_NAME, function (Blueprint $table) {
            $table->uuid(BaseDefinition::ID)->primary();

            $table->string(ArticleDefinition::TITLE,2048);
            $table->text(ArticleDefinition::CONTENT)->nullable();
            $table->string(ArticleDefinition::URL,2048);
            $table->dateTime(ArticleDefinition::PUBLISHED_AT);

            $table->enum(ArticleDefinition::PROVIDER, array_map(fn($case) => $case->value, NewsProvidersEnum::cases()));

            $table->foreignUuid(ArticleDefinition::SOURCE_ID)
                ->references(BaseDefinition::ID)
                ->on(SourceDefinition::TABLE_NAME)
                ->cascadeOnDelete();

            $table->foreignUuid(ArticleDefinition::CATEGORY_ID)
                ->references(BaseDefinition::ID)
                ->on(CategoryDefinition::TABLE_NAME)
                ->cascadeOnDelete();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(ArticleDefinition::TABLE_NAME);
    }
};
