<?php

namespace App\Services\Base;

use App\Services\ArticleService;
use App\Services\AuthorService;
use App\Services\CategoryService;
use App\Services\SourceService;
use App\Vendors\NewsAPI\Services\NewsAPIService;
use App\Vendors\TheGuardian\Services\TheGuardianService;

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
     * @return NewsAPIService
     */
    public static function newsAPIService() : NewsAPIService {
        return resolve(NewsAPIService::class);
    }

    /**
     * @return TheGuardianService
     */
    public static function theGuardianService() : TheGuardianService {
        return resolve(TheGuardianService::class);
    }

}
