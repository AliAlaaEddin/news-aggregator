<?php

namespace App\Vendors\TheGuardian\DTOs;

use App\Enums\NewsProvidersEnum;
use App\Vendors\Base\DTOs\CategoryDTO;
use Spatie\LaravelData\Data;

class TheGuardianSection extends Data {

    /**
     * @param string $id
     * @param string $webTitle
     */
    public function __construct(
        public string $id,
        public string $webTitle,
    ) { }

    public static function toCategoryDTO(self $section): CategoryDTO
    {
        return new CategoryDTO(
            NewsProvidersEnum::THE_GUARDIAN,
            $section->webTitle,
            $section->id
        );
    }

}
