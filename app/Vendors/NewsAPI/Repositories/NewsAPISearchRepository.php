<?php

namespace App\Vendors\NewsAPI\Repositories;

use App\Services\Base\ServiceHelper;
use App\Vendors\NewsAPI\DTOs\NewsAPIArticle;
use App\Vendors\NewsAPI\DTOs\Responses\NewsAPIEverythingResponse;
use Carbon\Carbon;

class NewsAPISearchRepository extends BaseNewsAPIClient {

    /**
     * @param string $from
     * @param string $to
     * @param int $page
     * @param int $perPage
     * @return array
     */
    public function searchAll(string $from,string $to, int $page = 1,int $perPage = 100) : array {
        $sources = ServiceHelper::sourceService()->getNewsAPISources();


        $response = $this->get(config('news_api.urls.everything') . "?page=$page&pageSize=$perPage&sources=$sources&from=$from&to=$to");

        if(!$response || $response->status() != 200){
            return [];
        }

        $parsedResponse = NewsAPIEverythingResponse::from($response->json());
        return [
            NewsAPIArticle::collect($parsedResponse->articles),
            $parsedResponse->totalResults
        ];
    }

}
