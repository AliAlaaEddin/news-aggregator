<?php

namespace App\Vendors\NewsAPI\Services;

use App\Definitions\BaseDefinition;
use App\Enums\NewsProvidersEnum;
use App\Services\Base\ServiceHelper;
use App\Vendors\Base\DTOs\CategoryDTO;
use App\Vendors\Base\DTOs\SourceDTO;
use App\Vendors\Base\IBaseNewsProviderServiceInterface;
use App\Vendors\NewsAPI\DTOs\NewsAPIArticle;
use App\Vendors\NewsAPI\DTOs\NewsAPIExtendedSource;
use App\Vendors\NewsAPI\Repositories\NewsAPISearchRepository;
use App\Vendors\NewsAPI\Repositories\NewsAPISourceRepository;

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


    public function populateNewsArticles(): void
    {

        $from = now()->subDay()->subHour()->format('Y-m-d\TH:i:s');
        $to = now()->subDay()->format('Y-m-d\TH:i:s');
        $page = 1;
        $perPage = 50;


        do {
            [$results, $total] = $this->newsAPISearchRepository->searchAll($from, $to, $page, $perPage);

            /** @var NewsAPIArticle $result */
            foreach ($results as $result) {
                if(!$result->source?->id || !$result->author){
                    continue;
                }

                $source = ServiceHelper::sourceService()->getSourceByRemoteID(NewsProvidersEnum::NEWS_API, $result->source?->id);
                $author = ServiceHelper::authorService()->getOrCreateAuthor(NewsProvidersEnum::NEWS_API,$result->author);

                if ($source) {
                    ServiceHelper::articleService()->addArticle(
                        $result->title,
                        $result->content,
                        $result->url,
                        $result->publishedAt,
                        $source[BaseDefinition::ID],
                        $author[BaseDefinition::ID],
                    );
                }
            }
            $page++;
        } while ($page <= ceil((float)(min(100, $total) / $perPage)));

    }
}
