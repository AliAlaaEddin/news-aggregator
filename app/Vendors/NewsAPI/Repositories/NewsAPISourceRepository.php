<?php

namespace App\Vendors\NewsAPI\Repositories;


use App\Vendors\NewsAPI\DTOs\NewsAPISource;
use App\Vendors\NewsAPI\DTOs\Responses\NewsAPISourcesResponse;

class NewsAPISourceRepository extends BaseNewsAPIClient {

    /**
     * @return NewsAPISource[]
     */
    public function getAllSources() : array {

        $response = $this->get(config('news_api.urls.sources'));

        if(!$response || $response->status() != 200){
            return [];
        }

        $parsedResponse = NewsAPISourcesResponse::from($response->json());
        return NewsAPISource::collect($parsedResponse->sources);
    }

}
