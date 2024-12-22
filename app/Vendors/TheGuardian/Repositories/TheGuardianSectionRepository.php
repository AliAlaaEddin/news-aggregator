<?php

namespace App\Vendors\TheGuardian\Repositories;

use App\Vendors\TheGuardian\DTOs\Responses\TheGuardianSectionsResponse;
use App\Vendors\TheGuardian\DTOs\TheGuardianSection;

class TheGuardianSectionRepository extends BaseTheGuardianRepository {

    /**
     * @return TheGuardianSection[]
     */
    public function getSections() : array {
        $response = $this->get(config('the_guardian.urls.sections'));

        if ($response->getStatusCode() != 200) {
            return [];
        }

        $parsedResponse = TheGuardianSectionsResponse::from($response->json()['response']);
        return TheGuardianSection::collect($parsedResponse->results);
    }

}
