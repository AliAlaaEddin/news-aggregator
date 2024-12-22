<?php

namespace App\Vendors\NewsAPI\Repositories;


use App\Vendors\NewsAPI\DTOs\NewsAPIExtendedSource;
use App\Vendors\NewsAPI\DTOs\Responses\NewsAPISourcesResponse;

class NewsAPISourceRepository extends BaseNewsAPIClient {

    /**
     * @return NewsAPIExtendedSource[]
     */
    public function getAllSources() : array {

        $response = $this->get(config('news_api.urls.sources'));

        if(!$response || $response->status() != 200){
            return [];
        }

        $parsedResponse = NewsAPISourcesResponse::from($response->json());
        return NewsAPIExtendedSource::collect($parsedResponse->sources);
    }

}
