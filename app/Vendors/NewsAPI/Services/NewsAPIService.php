<?php

namespace App\Vendors\NewsAPI\Services;

use App\Enums\NewsProvidersEnum;
use App\Services\Base\ServiceHelper;
use App\Vendors\Base\DTOs\ArticleDTO;
use App\Vendors\Base\DTOs\CategoryDTO;
use App\Vendors\Base\DTOs\SourceDTO;
use App\Vendors\Base\IBaseNewsProviderServiceInterface;
use App\Vendors\NewsAPI\DTOs\NewsAPIArticle;
use App\Vendors\NewsAPI\DTOs\NewsAPIExtendedSource;
use App\Vendors\NewsAPI\Repositories\NewsAPISearchRepository;
use App\Vendors\NewsAPI\Repositories\NewsAPISourceRepository;
use Carbon\Carbon;

class NewsAPIService implements IBaseNewsProviderServiceInterface
{

    private NewsAPISearchRepository $newsAPISearchRepository;
    private NewsAPISourceRepository $newsAPISourceRepository;

    public function __construct(
        NewsAPISearchRepository $newsAPISearchRepository,
        NewsAPISourceRepository $newsAPISourceRepository
    )
    {
        $this->newsAPISearchRepository = $newsAPISearchRepository;
        $this->newsAPISourceRepository = $newsAPISourceRepository;
    }


    /**
     * @return SourceDTO[]
     */
    public function getSources(): array
    {
        $sources = $this->newsAPISourceRepository->getAllSources();

        return array_map([NewsAPIExtendedSource::class,'toSourceDTO'],$sources);

    }

    /**
     * @return CategoryDTO[]
     */
    public function getCategories(): array
    {
        $staticCategories = [
            'business',
            'entertainment',
            'general',
            'health',
            'science',
            'sports',
            'technology'
        ];

        return array_map(function (string $staticCategory) {
            return new CategoryDTO(
                NewsProvidersEnum::NEWS_API,
                $staticCategory,
                $staticCategory
            );
        },$staticCategories);
    }


    /**
     * @param Carbon $fromTime
     * @param Carbon $toTime
     * @return ArticleDTO[]
     */
    public function getArticles(Carbon $fromTime, Carbon $toTime): array
    {
        $categories = $this->getCategories();

        // "->subDay()" is for the dev account limitation
        $fromTime = $fromTime->subDay();
        $toTime = $toTime->subDay();

        $articles = [];
        foreach ($categories as $category) {
            $articles = array_merge($articles,$this->newsAPISearchRepository->topHeadlines($category->remoteID));
        }

        $articles = array_filter($articles,function (NewsAPIArticle $article) use ($toTime, $fromTime) {

            /**
             * The condition Should look like this, to filter out the already added articles
             * however the testing account does not return all the headlines
             * So for the sake of testing I removed it to always get the data even if it is old
             *
             * return $article->source?->id && $article->author && $article->publishedAt->between($fromTime, $toTime);
             */


            return $article->source?->id && $article->author;
        });

        return array_map([NewsAPIArticle::class,'toArticleDTO'],$articles);
    }
}
