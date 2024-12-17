<?php

use App\Models\Definitions\ArticlesDefinition;
use App\Models\Definitions\AuthorDefinition;
use App\Models\Definitions\BaseDefinition;
use App\Models\Definitions\SourceDefinition;
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
        Schema::create(ArticlesDefinition::TABLE_NAME, function (Blueprint $table) {
            $table->uuid(BaseDefinition::ID)->primary();

            $table->string(ArticlesDefinition::TITLE,2048);
            $table->text(ArticlesDefinition::CONTENT)->nullable();
            $table->string(ArticlesDefinition::URL,2048);
            $table->dateTime(ArticlesDefinition::PUBLISHED_AT);

            $table->foreignUuid(ArticlesDefinition::AUTHOR_ID)
                ->references(BaseDefinition::ID)
                ->on(AuthorDefinition::TABLE_NAME)
                ->cascadeOnDelete();

            $table->foreignUuid(ArticlesDefinition::SOURCE_ID)
                ->references(BaseDefinition::ID)
                ->on(SourceDefinition::TABLE_NAME)
                ->cascadeOnDelete();

            // TODO Complete This migration Add Category

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(ArticlesDefinition::TABLE_NAME);
    }
};
