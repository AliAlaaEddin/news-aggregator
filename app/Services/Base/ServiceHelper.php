<?php

namespace App\Services\Base;

use App\Services\ArticleService;
use App\Services\AuthorService;
use App\Services\CategoryService;
use App\Services\SourceService;
use App\Vendors\NewsProvidersManager;

class ServiceHelper {

    /**
     * @return AuthorService
     */
    public static function authorService() : AuthorService {
        return resolve(AuthorService::class);
    }

    /**
     * @return ArticleService
     */
    public static function articleService() : ArticleService {
        return resolve(ArticleService::class);
    }

    /**
     * @return CategoryService
     */
    public static function categoryService() : CategoryService {
        return resolve(CategoryService::class);
    }

    /**
     * @return SourceService
     */
    public static function sourceService() : SourceService {
        return resolve(SourceService::class);
    }

    /**
     * @return NewsProvidersManager
     */
    public static function newsProvidersManager() : NewsProvidersManager
    {
        return resolve(NewsProvidersManager::class);
    }

}
