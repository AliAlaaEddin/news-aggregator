<?php

namespace App\Vendors\Base\DTOs;

use App\Enums\NewsProvidersEnum;
use Carbon\Carbon;
use Spatie\LaravelData\Data;

class ArticleDTO extends Data {

    /**
     * @param string $title
     * @param ?string $content
     * @param string $url
     * @param Carbon $publishedAt
     * @param string $sourceRemoteID
     * @param AuthorDTO[] $authors
     * @param NewsProvidersEnum $provider
     */
    public function __construct(
        public NewsProvidersEnum $provider,
        public string $title,
        public ?string $content,
        public string $url,
        public Carbon $publishedAt,
        public string $sourceRemoteID,
        public array $authors,
    )
    {
    }

}
