<?php

namespace App\Vendors\TheGuardian\Repositories;

use App\Vendors\Base\BaseHttpClient;


class BaseTheGuardianRepository extends BaseHttpClient
{

    public function __construct()
    {
        parent::__construct(
            config('the_guardian.urls.base'),
            queryParams: [
                'api-key' => config('the_guardian.api_key')
            ]
        );
    }

}
