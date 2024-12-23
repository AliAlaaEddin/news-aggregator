<?php

namespace App\Vendors\NewsAPI\Repositories;

use App\Services\Base\ServiceHelper;
use App\Vendors\NewsAPI\DTOs\NewsAPIArticle;
use App\Vendors\NewsAPI\DTOs\Responses\NewsAPIEverythingResponse;
use Carbon\Carbon;

class NewsAPISearchRepository extends BaseNewsAPIClient
{

    /**
     * @param Carbon $from
     * @param Carbon $to
     * @param int|null $pageSize
     * @return array
     */
    public function searchAll(Carbon $from, Carbon $to,?int $pageSize = 50): array
    {
        $sources = ServiceHelper::sourceService()->getNewsAPISources();

        $page = 1;

        // "->subDay()" is for the dev account limitation
        $fromDateTime = $from->subDay()->format('Y-m-d\TH:i:s');
        $toDateTime = $to->subDay()->format('Y-m-d\TH:i:s');

        $results = [];

        do {

            $queryParams = [
                'page' => $page,
                'pageSize' => $pageSize,
                'sources' => $sources,
                'from' => $fromDateTime,
                'to' => $toDateTime
            ];

            $response = $this->get(config('news_api.urls.everything'), $queryParams);

            if (!$response || $response->status() != 200) {
                break;
            }

            $parsedResponse = NewsAPIEverythingResponse::from($response->json());
            $results = array_merge($results,$parsedResponse->articles);

            $page++;
            $totalResults = min(100, $parsedResponse->totalResults); // Development Account limitation
            $fetchedAllPages = $page <= ceil(($totalResults / $pageSize));

        } while ($fetchedAllPages);

        return NewsAPIArticle::collect($results);
    }



}
