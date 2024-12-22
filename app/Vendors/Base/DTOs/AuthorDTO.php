<?php

namespace App\Vendors\Base\DTOs;

use App\Enums\NewsProvidersEnum;
use Spatie\LaravelData\Data;

class AuthorDTO extends Data {

    /**
     * @param NewsProvidersEnum $provider
     * @param string $name
     * @param string|null $bio
     * @param string|null $imageURL
     * @param string|null $remoteID
     */
    public function __construct(
        public NewsProvidersEnum $provider,
        public string $name,
        public ?string $bio = null,
        public ?string $imageURL = null,
        public ?string $remoteID = null
    )
    {
    }
}
