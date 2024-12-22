<?php

namespace App\Vendors\TheGuardian\DTOs;

use Spatie\LaravelData\Data;

class TheGuardianTag extends Data {

    /**
     * @param string $id
     * @param string $type
     * @param string|null $webTitle
     * @param string|null $bio
     * @param string|null $bylineImageUrl
     * @param string|null $firstName
     * @param string|null $lastName
     */
    public function __construct(
        public string $id,
        public string $type,
        public ?string $webTitle,
        public ?string $bio,
        public ?string $bylineImageUrl,
        public ?string $firstName,
        public ?string $lastName,
    )
    {

    }

}
