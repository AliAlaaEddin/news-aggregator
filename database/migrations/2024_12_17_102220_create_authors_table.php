<?php

use App\Definitions\AuthorDefinition;
use App\Definitions\BaseDefinition;
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
        Schema::create(AuthorDefinition::TABLE_NAME, function (Blueprint $table) {
            $table->uuid(BaseDefinition::ID)->primary();

            $table->string(AuthorDefinition::NAME);
            $table->text(AuthorDefinition::BIO)->nullable();
            $table->string(AuthorDefinition::IMAGE_URL,2048)->nullable();
            $table->string(AuthorDefinition::REMOTE_ID);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(AuthorDefinition::TABLE_NAME);
    }
};
