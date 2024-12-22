<?php

namespace App\Vendors\TheGuardian\DTOs;

use Carbon\Carbon;
use Spatie\LaravelData\Data;

class TheGuardianArticle extends Data {

    /**
     * @param string $id
     * @param string $type
     * @param string $sectionId
     * @param string $sectionName
     * @param Carbon $webPublicationDate
     * @param string $webTitle
     * @param string $webUrl
     * @param string $apiUrl
     * @param null|TheGuardianTag[] $tags
     * @param bool $isHosted
     * @param string $pillarId
     * @param string $pillarName
     */
    public function __construct(
        public string $id,
        public string $type,
        public string $sectionId,
        public string $sectionName,
        public Carbon $webPublicationDate,
        public string $webTitle,
        public string $webUrl,
        public string $apiUrl,
        public ?array $tags,
        public bool $isHosted,
        public string $pillarId,
        public string $pillarName,
    )
    {

    }


}
