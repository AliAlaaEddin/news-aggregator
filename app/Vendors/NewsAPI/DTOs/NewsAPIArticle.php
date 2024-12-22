<?php

namespace App\Vendors\NewsAPI\DTOs;

use Carbon\Carbon;
use Spatie\LaravelData\Data;

class NewsAPIArticle extends Data
{

    /**
     * @param NewsAPISource $source
     * @param string|null $author
     * @param string $title
     * @param string|null $description
     * @param string $url
     * @param string|null $urlToImage
     * @param Carbon $publishedAt
     * @param string|null $content
     */
    public function __construct(
        public NewsAPISource $source,
        public ?string $author,
        public string $title,
        public ?string $description,
        public string $url,
        public ?string $urlToImage,
        public Carbon $publishedAt,
        public ?string $content,
    ) {

    }

}
