<?php

namespace App\Vendors\NewsAPI\Repositories;

use App\Services\Base\ServiceHelper;
use App\Vendors\NewsAPI\DTOs\NewsAPIArticle;
use App\Vendors\NewsAPI\DTOs\Responses\NewsAPIListingResponse;
use Carbon\Carbon;

class NewsAPISearchRepository extends BaseNewsAPIClient
{

    /**
     * @param string $category
     * @param int|null $pageSize
     * @return array
     */
    public function topHeadlines(string $category,?int $pageSize = 50): array
    {

        $page = 1;

        $results = [];

        do {

            $queryParams = [
                'page' => $page,
                'pageSize' => $pageSize,
                'category' => $category
            ];

            $response = $this->get(config('news_api.urls.top-headlines'), $queryParams);

            if (!$response || $response->status() != 200) {
                break;
            }

            $parsedResponse = NewsAPIListingResponse::from($response->json());
            foreach ($parsedResponse->articles as $article) {
                $article->categoryID = $category;
            }

            $results = array_merge($results,$parsedResponse->articles);

            $page++;
            $totalResults = min(100, $parsedResponse->totalResults); // Development Account limitation
            $fetchedAllPages = $page <= ceil(($totalResults / $pageSize));

        } while ($fetchedAllPages);

        return NewsAPIArticle::collect($results);
    }




}
