<?php

return [
    /**
     * Secrets
     */
    'api_key' => env('NEWS_API_KEY'),

    /**
     * URLs
     */
    'urls' => [
        'base' => 'https://newsapi.org/v2',
        'top_headline' => '/top-headlines',
        'sources' => '/top-headlines/sources',
    ]
];
