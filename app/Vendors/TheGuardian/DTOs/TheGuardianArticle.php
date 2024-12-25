<?php

namespace App\Vendors\TheGuardian\DTOs;

use App\Enums\NewsProvidersEnum;
use App\Vendors\Base\DTOs\ArticleDTO;
use App\Vendors\Base\DTOs\AuthorDTO;
use Carbon\Carbon;
use Spatie\LaravelData\Data;

class TheGuardianArticle extends Data {

    /**
     * @param string $id
     * @param string $type
     * @param string $sectionId
     * @param string $sectionName
     * @param Carbon $webPublicationDate
     * @param string $webTitle
     * @param string $webUrl
     * @param string $apiUrl
     * @param null|TheGuardianTag[] $tags
     * @param bool $isHosted
     * @param ?string $pillarId
     * @param ?string $pillarName
     */
    public function __construct(
        public string $id,
        public string $type,
        public string $sectionId,
        public string $sectionName,
        public Carbon $webPublicationDate,
        public string $webTitle,
        public string $webUrl,
        public string $apiUrl,
        public ?array $tags,
        public bool $isHosted,
        public ?string $pillarId,
        public ?string $pillarName,
    ) { }

    /**
     * @param TheGuardianArticle $theGuardianArticle
     * @return ArticleDTO
     */
    public static function toArticleDTO(self $theGuardianArticle) : ArticleDTO {
        $authors = [];

        /** @var TheGuardianTag $tag */
        foreach ($theGuardianArticle->tags as $tag) {
            if($tag->type == 'contributor') {
                $authors[] = new AuthorDTO(
                    NewsProvidersEnum::THE_GUARDIAN,
                    $tag->webTitle,
                    $tag->bio,
                    $tag->bylineImageUrl,
                    $tag->id
                );
            }
        }

        return new ArticleDTO(
            NewsProvidersEnum::THE_GUARDIAN,
            $theGuardianArticle->webTitle,
            null,
            $theGuardianArticle->webUrl,
            $theGuardianArticle->webPublicationDate,
            NewsProvidersEnum::THE_GUARDIAN->value,
            $theGuardianArticle->sectionId,
            $authors
        );
    }

}
