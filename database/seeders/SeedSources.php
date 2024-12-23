<?php

namespace Database\Seeders;

use App\Services\Base\ServiceHelper;
use Illuminate\Database\Seeder;

class SeedSources extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sources = ServiceHelper::newsProvidersManager()->getSources();
        foreach ($sources as $source) {
            ServiceHelper::sourceService()->addSource(
                $source->provider,
                $source->name,
                $source->description,
                $source->url,
                $source->remoteID
            );
        }
    }
}
