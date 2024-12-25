<?php

namespace App\Vendors\Base\DTOs;

use App\Enums\NewsProvidersEnum;
use Carbon\Carbon;
use Spatie\LaravelData\Data;

class ArticleDTO extends Data {

    /**
     * @param NewsProvidersEnum $provider
     * @param string $title
     * @param ?string $content
     * @param string $url
     * @param Carbon $publishedAt
     * @param string $sourceRemoteID
     * @param ?string $categoryRemoteID
     * @param AuthorDTO[] $authors
     */
    public function __construct(
        public NewsProvidersEnum $provider,
        public string $title,
        public ?string $content,
        public string $url,
        public Carbon $publishedAt,
        public string $sourceRemoteID,
        public ?string $categoryRemoteID,
        public array $authors,
    )
    {
    }

}
