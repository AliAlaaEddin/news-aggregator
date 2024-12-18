<?php

namespace App\Vendors\NewsAPI\Services;

use App\Definitions\ArticlesDefinition;
use App\Services\Base\ServiceHelper;
use App\Vendors\NewsAPI\DTOs\NewsAPIArticle;
use App\Vendors\NewsAPI\DTOs\NewsAPISource;
use App\Vendors\NewsAPI\Repositories\NewsAPISearchRepository;
use App\Vendors\NewsAPI\Repositories\NewsAPISourceRepository;

class NewAPISearchService
{

    private NewsAPISearchRepository $newsAPISearchRepository;

    public function __construct(NewsAPISearchRepository $newsAPISearchRepository)
    {
        $this->newsAPISearchRepository = $newsAPISearchRepository;
    }

    /**
     * @return NewsAPISource[]
     */
    public function search(): void
    {
        $from = now()->subDay()->subHour()->format('Y-m-d\TH:i:s');
        $to = now()->subDay()->format('Y-m-d\TH:i:s');

        error_log("Searching for $from to $to");
        $page = 1;
        $perPage = 100;

//        do {
            [$results, $total] = $this->newsAPISearchRepository->searchAll($from, $to, $page, $perPage);


            /** @var NewsAPIArticle $result */
            foreach ($results as $result) {
                ServiceHelper::articleService()->addArticle(
                    $result->title,
                    $result->content,
                    $result->url,
                    $result->publishedAt,
                    $result->author
                );
            }
            $page++;
//        } while ($page <= ceil((float)($total / $perPage)));


    }

}
