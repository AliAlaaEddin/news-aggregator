<?php


namespace App\Vendors\Base\DTOs;

use App\Enums\NewsProvidersEnum;
use Spatie\LaravelData\Data;

class SourceDTO extends Data {

    public function __construct(
        public NewsProvidersEnum $provider,
        public string $name,
        public ?string $description,
        public ?string $url,
        public ?string $remoteID
    ) {}

}
