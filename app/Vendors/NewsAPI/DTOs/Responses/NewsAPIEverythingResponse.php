<?php

namespace App\Vendors\NewsAPI\DTOs\Responses;

use App\Vendors\NewsAPI\DTOs\NewsAPIArticle;
use Spatie\LaravelData\Data;

class NewsAPIEverythingResponse extends Data
{
    /**
     * @param string $status
     * @param int $totalResults
     * @param NewsAPIArticle[] $articles
     */
    public function __construct(
        public string $status,
        public int $totalResults,
        public array $articles,
    ) {

    }

}
