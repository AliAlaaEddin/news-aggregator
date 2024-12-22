<?php

namespace App\Vendors\NewsAPI\DTOs;

use Spatie\LaravelData\Data;

class NewsAPISource extends Data
{

    /**
     * @param null|string $id
     * @param string $name
     */
    public function __construct(
        public ?string $id,
        public string $name,
    ) {

    }

}
