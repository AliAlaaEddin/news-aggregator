<?php

use App\Definitions\BaseDefinition;
use App\Definitions\CategoryDefinition;
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
        Schema::create(CategoryDefinition::TABLE_NAME, function (Blueprint $table) {
            $table->uuid(BaseDefinition::ID)->primary();

            $table->string(CategoryDefinition::NAME);
            $table->string(CategoryDefinition::REMOTE_ID);
            $table->enum(CategoryDefinition::PROVIDER, array_map(fn($case) => $case->value, NewsProvidersEnum::cases()));


            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(CategoryDefinition::TABLE_NAME);
    }
};
