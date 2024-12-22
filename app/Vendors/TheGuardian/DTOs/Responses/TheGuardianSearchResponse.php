<?php

namespace App\Vendors\TheGuardian\DTOs\Responses;

use App\Vendors\TheGuardian\DTOs\TheGuardianArticle;
use Spatie\LaravelData\Data;

class TheGuardianSearchResponse extends Data {

    /**
     * @param string $status
     * @param string $userTier
     * @param int $total
     * @param int $startIndex
     * @param int $pageSize
     * @param int $currentPage
     * @param int $pages
     * @param string $orderBy
     * @param TheGuardianArticle[] $results
     */
    public function __construct(
        public string $status,
        public string $userTier,
        public int $total,
        public int $startIndex,
        public int $pageSize,
        public int $currentPage,
        public int $pages,
        public string $orderBy,
        public array $results,
    ) {

    }

}
