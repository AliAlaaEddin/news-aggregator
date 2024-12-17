<?php

namespace App\Vendors\Base;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class BaseHttpClient {

    protected PendingRequest $authenticatedClient;

    public function __construct(string $baseUrl,array $headers = [])
    {
        $this->authenticatedClient = Http::withHeaders($headers)->baseUrl($baseUrl);
    }

    /**
     * @param string $url
     * @return Response|null
     */
    protected function get(string $url) : ?Response
    {
        try {
            return $this->authenticatedClient->get($url);
        } catch (ConnectionException $exception) {
            logger()->error($exception->getMessage());
            return null;
        }
    }

}
