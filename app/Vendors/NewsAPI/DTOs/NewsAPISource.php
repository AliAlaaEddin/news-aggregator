<?php

namespace App\Vendors\NewsAPI\DTOs;

use Spatie\LaravelData\Data;

class NewsAPISource extends Data
{

    /**
     * @param string $id
     * @param string $name
     * @param string $description
     * @param string $url
     * @param string $category
     * @param string $language
     * @param string $country
     */
    public function __construct(
        public string $id,
        public string $name,
        public string $description,
        public string $url,
        public string $category,
        public string $language,
        public string $country,
    ) {

    }

}
