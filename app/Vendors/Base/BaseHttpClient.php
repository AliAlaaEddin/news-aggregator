<?php

namespace App\Vendors\Base;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class BaseHttpClient {

    protected PendingRequest $authenticatedClient;

    public function __construct(string $baseUrl,array $headers = [],array $queryParams = [])
    {
        $this->authenticatedClient = Http::withHeaders($headers)->withQueryParameters($queryParams)->baseUrl($baseUrl);
    }

    /**
     * @param string $url
     * @param array|null $queryParams
     * @return Response|null
     */
    protected function get(string $url,?array $queryParams = []) : ?Response
    {
        try {

            $clonedClient = clone $this->authenticatedClient;

            $result = $clonedClient->withQueryParameters($queryParams)->get($url);

            unset($clonedClient);

            return $result;

        } catch (ConnectionException $exception) {
            logger()->error($exception->getMessage());
            return null;
        }
    }

}
