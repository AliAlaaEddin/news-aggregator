<?php

namespace App\Vendors\Base\DTOs;

use App\Enums\NewsProvidersEnum;
use Spatie\LaravelData\Data;

class CategoryDTO extends Data {

    /**
     * @param NewsProvidersEnum $provider
     * @param string $name
     * @param string $remoteID
     */
    public function __construct(
        public NewsProvidersEnum $provider,
        public string $name,
        public string $remoteID
    )
    {
    }

}
