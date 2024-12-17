<?php

namespace App\Vendors\NewsAPI\Services;

use App\Vendors\NewsAPI\DTOs\NewsAPISource;
use App\Vendors\NewsAPI\Repositories\NewsAPISourceRepository;

class NewsAPISourceService {

    private NewsAPISourceRepository $newsAPISourceRepository;

    public function __construct(NewsAPISourceRepository $newsAPISourceRepository) {
        $this->newsAPISourceRepository = $newsAPISourceRepository;
    }

    /**
     * @return NewsAPISource[]
     */
    public function getNewsAPISources() : array {
        return $this->newsAPISourceRepository->getAllSources();
    }

}
