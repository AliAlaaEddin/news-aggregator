<?php

namespace Database\Seeders;

use App\Enums\NewsProvidersEnum;
use App\Services\Base\ServiceHelper;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TheGuardianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->addCategories();

        $this->addSources();
    }


    /**
     * @return void
     */
    private function addCategories(): void {
        $categories = ServiceHelper::theGuardianService()->getCategories();
        foreach ($categories as $category) {
            ServiceHelper::categoryService()->addCategory(
                NewsProvidersEnum::THE_GUARDIAN,
                $category->webTitle,
                $category->id,
            );
        }
    }

    /**
     * @return void
     */
    private function addSources(): void {
        $sources = ServiceHelper::theGuardianService()->getSources();
        foreach ($sources as $source) {
            ServiceHelper::sourceService()->addSource(
                NewsProvidersEnum::THE_GUARDIAN,
                $source,
                remoteID: $source
            );
        }
    }
}
