<?php

use App\Definitions\BaseDefinition;
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
        Schema::create(SourceDefinition::TABLE_NAME, function (Blueprint $table) {
            $table->uuid(BaseDefinition::ID)->primary();

            $table->string(SourceDefinition::NAME);
            $table->text(SourceDefinition::DESCRIPTION)->nullable();
            $table->string(SourceDefinition::URL)->nullable();
            $table->string(SourceDefinition::REMOTE_ID);
            $table->enum(SourceDefinition::PROVIDER, array_map(fn($case) => $case->value, NewsProvidersEnum::cases()));


            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(SourceDefinition::TABLE_NAME);
    }
};
