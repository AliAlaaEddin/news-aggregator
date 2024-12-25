<?php

namespace App\Vendors\NewsAPI\DTOs;

use App\Enums\NewsProvidersEnum;
use App\Vendors\Base\DTOs\ArticleDTO;
use App\Vendors\Base\DTOs\AuthorDTO;
use Carbon\Carbon;
use Spatie\LaravelData\Data;

class NewsAPIArticle extends Data
{

    /**
     * @param NewsAPISource $source
     * @param string|null $author
     * @param string $title
     * @param string|null $description
     * @param string $url
     * @param string|null $urlToImage
     * @param Carbon $publishedAt
     * @param string|null $content
     */
    public function __construct(
        public NewsAPISource $source,
        public ?string $author,
        public string $title,
        public ?string $description,
        public string $url,
        public ?string $urlToImage,
        public Carbon $publishedAt,
        public ?string $content,
        public ?string $categoryID,
    ) {

    }


    /**
     * @param NewsAPIArticle $newsAPIArticle
     * @return ArticleDTO
     */
    public static function toArticleDTO(self $newsAPIArticle) : ArticleDTO {
        return new ArticleDTO(
            NewsProvidersEnum::NEWS_API,
            $newsAPIArticle->title,
            $newsAPIArticle->content,
            $newsAPIArticle->url,
            $newsAPIArticle->publishedAt,
            $newsAPIArticle->source->id,
            $newsAPIArticle->categoryID,
            [
                new AuthorDTO(
                    NewsProvidersEnum::NEWS_API,
                    $newsAPIArticle->author,
                )
            ]
        );
    }

}
