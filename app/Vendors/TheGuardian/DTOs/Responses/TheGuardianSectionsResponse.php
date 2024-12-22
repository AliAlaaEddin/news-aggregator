<?php

namespace App\Vendors\TheGuardian\DTOs\Responses;

use App\Vendors\TheGuardian\DTOs\TheGuardianSection;
use Spatie\LaravelData\Data;

class TheGuardianSectionsResponse extends Data {

    /**
     * @param string $status
     * @param string $userTier
     * @param int $total
     * @param TheGuardianSection[] $results
     */
    public function __construct(
        public string $status,
        public string $userTier,
        public int $total,
        public array $results,
    ) {
    }


}
