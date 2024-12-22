<?php

namespace App\Vendors\NewsAPI\DTOs;


use App\Enums\NewsProvidersEnum;
use App\Vendors\Base\DTOs\SourceDTO;

class NewsAPIExtendedSource extends NewsAPISource
{

    /**
     * @param null|string $id
     * @param string $name
     * @param string $description
     * @param string $url
     * @param string $category
     * @param string $language
     * @param string $country
     */
    public function __construct(
        public ?string $id,
        public string $name,
        public string $description,
        public string $url,
        public string $category,
        public string $language,
        public string $country,
    ) {
        parent::__construct($id, $name);
    }

    /**
     * @param NewsAPIExtendedSource $source
     * @return SourceDTO
     */
    public static function toSourceDTO(self $source) : SourceDTO {
        return new SourceDTO(
            NewsProvidersEnum::NEWS_API,
            $source->name,
            $source->description,
            $source->url,
            $source->id,
        );
    }

}
