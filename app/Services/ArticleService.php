<?php

namespace App\Services;

use App\Definitions\ArticlesDefinition;
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
     * @param string $title
     * @param string $content
     * @param string|null $url
     * @param Carbon $publishedAt
     * @return Article
     */
    public function addArticle(
        string  $title,
        string  $content,
        ?string $url,
        Carbon  $publishedAt,
    ): Article
    {
        /** @var Article $article */
        $article = $this->repository->create([
            ArticlesDefinition::TITLE => $title,
            ArticlesDefinition::CONTENT => $content,
            ArticlesDefinition::URL => $url,
            ArticlesDefinition::PUBLISHED_AT => $publishedAt,
        ]);

        return $article;
    }

}
