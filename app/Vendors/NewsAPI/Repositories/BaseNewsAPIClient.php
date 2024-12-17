<?php

namespace App\Vendors\NewsAPI\Repositories;

use App\Vendors\Base\BaseHttpClient;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class BaseNewsAPIClient extends BaseHttpClient {

    public function __construct()
    {
        parent::__construct(config('news_api.urls.base'),
            [
                'X-Api-Key' => config('news_api.api_key')
            ]
        );
    }

}
