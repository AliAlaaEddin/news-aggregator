<?php

namespace App\Services\Base;

use App\Services\ArticleService;
use App\Services\AuthorService;
use App\Services\CategoryService;
use App\Services\SourceService;
use App\Vendors\NewsAPI\Services\NewAPISearchService;
use App\Vendors\NewsAPI\Services\NewsAPISourceService;
use SebastianBergmann\Type\StaticType;

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
     * @return NewsAPISourceService
     */
    public static function newsAPISourceService() : NewsAPISourceService {
        return resolve(NewsAPISourceService::class);
    }

    /**
     * @return NewAPISearchService
     */
    public static function newAPISearchService() : NewAPISearchService {
        return resolve(NewAPISearchService::class);
    }
}
