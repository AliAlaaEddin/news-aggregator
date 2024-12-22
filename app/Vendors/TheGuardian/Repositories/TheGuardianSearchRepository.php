<?php

namespace App\Vendors\TheGuardian\Repositories;

use App\Vendors\TheGuardian\DTOs\Responses\TheGuardianSearchResponse;
use App\Vendors\TheGuardian\DTOs\TheGuardianArticle;

class TheGuardianSearchRepository extends BaseTheGuardianRepository {

    /**
     * @param string $fromDate
     * @param int|null $pageSize
     * @return array
     */
    public function search(string $fromDate,?int $pageSize = 50) : array {

        $results = [];
        $page = 1;
        $fetchedAllPages = true;

        do {
            $queryParams = [
                'show-tags' => 'contributor',
                'from-date' => $fromDate,
                'page-size' => $pageSize,
                'page' => $page
            ];

            $response = $this->get(config('the_guardian.urls.search'),$queryParams);

            if($response->status() == 200){

                $parsedResponse = TheGuardianSearchResponse::from($response->json()['response']);

                $results = array_merge(TheGuardianArticle::collect($parsedResponse->results),$results);

                $fetchedAllPages = $page == $parsedResponse->pages;
                $page++;

            }

        } while (!$fetchedAllPages);


        return $results;
    }

}
