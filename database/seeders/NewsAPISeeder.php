<?php

namespace Database\Seeders;

use App\Enums\NewsProvidersEnum;
use App\Services\Base\ServiceHelper;
use Illuminate\Database\Seeder;

class NewsAPISeeder extends Seeder
{
    private array $categories = [
        'business',
        'entertainment',
        'general',
        'health',
        'science',
        'sports',
        'technology'
    ];

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
        foreach ($this->categories as $category) {
            ServiceHelper::categoryService()->addCategory(
                NewsProvidersEnum::NEWS_API,
                $category,
                $category,
            );
        }
    }

    /**
     * @return void
     */
    private function addSources(): void {
        $sources = ServiceHelper::newsAPIService()->getSources();
        foreach ($sources as $source) {
            ServiceHelper::sourceService()->addSource(
                $source->provider,
                $source->name,
                $source->description,
                $source->url,
                $source->remoteID,
            );
        }
    }
}
