<?php

namespace Database\Seeders;

use App\Services\Base\ServiceHelper;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeedCategories extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ServiceHelper::newsProvidersManager()->getCategories();
        foreach ($categories as $category) {
            ServiceHelper::categoryService()->addCategory(
                $category->provider,
                $category->name,
                $category->remoteID
            );
        }
    }
}
