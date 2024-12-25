<?php

namespace App\Services;

use App\Definitions\ArticleDefinition;
use App\Enums\NewsProvidersEnum;
use App\Models\Article;
use App\Repositories\ArticleRepository;
use App\Services\Base\BaseService;
use Carbon\Carbon;

/**
 * @property ArticleRepository $repository
 */
class ArticleService extends BaseService
{

    /**
     * @param ArticleRepository $repository
     */
    public function __construct(ArticleRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * @param NewsProvidersEnum $provider
     * @param string $title
     * @param string|null $content
     * @param string|null $url
     * @param Carbon $publishedAt
     * @param string $sourceID
     * @param string $categoryID
     * @param array $authorIDs
     * @return Article
     */
    public function addArticle(
        NewsProvidersEnum $provider,
        string  $title,
        ?string  $content,
        ?string $url,
        Carbon  $publishedAt,
        string $sourceID,
        string $categoryID,
        array $authorIDs
    ): Article
    {
        /** @var Article $article */
        $article = $this->repository->create([
            ArticleDefinition::TITLE => $title,
            ArticleDefinition::CONTENT => $content,
            ArticleDefinition::URL => $url,
            ArticleDefinition::PUBLISHED_AT => $publishedAt,
            ArticleDefinition::SOURCE_ID => $sourceID,
            ArticleDefinition::CATEGORY_ID => $categoryID,
            ArticleDefinition::PROVIDER => $provider
        ]);

        $article->authors()->attach($authorIDs);

        return $article;
    }

}
