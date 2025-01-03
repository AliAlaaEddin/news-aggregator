<?php

namespace App\Vendors\NewsAPI\DTOs\Responses;

use App\Vendors\NewsAPI\DTOs\NewsAPIExtendedSource;
use Spatie\LaravelData\Data;

class NewsAPISourcesResponse extends Data
{

    /**
     * @param string $status
     * @param NewsAPIExtendedSource[] $sources
     */
    public function __construct(
        public string $status,
        public array $sources,
    ) {

    }

}
