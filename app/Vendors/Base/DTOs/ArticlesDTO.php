<?php

namespace App\Vendors\Base\DTOs;

use App\Enums\NewsProvidersEnum;
use Carbon\Carbon;
use Spatie\LaravelData\Data;

class ArticlesDTO extends Data {

    /**
     * @param string $title
     * @param string $content
     * @param string $url
     * @param Carbon $publishedAt
     * @param string $sourceRemoteID
     * @param AuthorDTO[] $authros
     * @param NewsProvidersEnum $provider
     */
    public function __construct(
        public string $title,
        public string $content,
        public string $url,
        public Carbon $publishedAt,
        public string $sourceRemoteID,
        public array $authros,
        public NewsProvidersEnum $provider
    )
    {
    }

}
