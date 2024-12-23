<?php

namespace App\Vendors\TheGuardian\Repositories;

use App\Vendors\TheGuardian\DTOs\Responses\TheGuardianSearchResponse;
use App\Vendors\TheGuardian\DTOs\TheGuardianArticle;
use Carbon\Carbon;

class TheGuardianSearchRepository extends BaseTheGuardianRepository {

    /**
     * @param Carbon $fromDate
     * @param int|null $pageSize
     * @return TheGuardianArticle[]
     */
    public function search(Carbon $fromDate,?int $pageSize = 50) : array {

        $results = [];
        $page = 1;
        $fetchedAllPages = true;

        do {
            $queryParams = [
                'show-tags' => 'contributor',
                'from-date' => $fromDate->toDateString(),
                'page-size' => $pageSize,
                'page' => $page
            ];

            $response = $this->get(config('the_guardian.urls.search'),$queryParams);

            if($response->status() == 200){

                $parsedResponse = TheGuardianSearchResponse::from($response->json()['response']);

                $results = array_merge($parsedResponse->results,$results);

                $fetchedAllPages = $page == $parsedResponse->pages;
                $page++;

            }

        } while (!$fetchedAllPages);


        return TheGuardianArticle::collect($results);
    }

}
