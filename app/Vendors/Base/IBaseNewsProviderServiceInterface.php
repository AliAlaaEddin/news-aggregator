<?php

namespace App\Vendors\Base;

use App\Vendors\Base\DTOs\ArticleDTO;
use App\Vendors\Base\DTOs\CategoryDTO;
use App\Vendors\Base\DTOs\SourceDTO;
use Carbon\Carbon;

interface IBaseNewsProviderServiceInterface {

    /**
     * @return SourceDTO[]
     */
    public function getSources() : array;

    /**
     * @return CategoryDTO[]
     */
    public function getCategories() : array;

    /**
     * @return ArticleDTO[]
     */
    public function getArticles(Carbon $fromTime, Carbon $toTime) : array;



}
