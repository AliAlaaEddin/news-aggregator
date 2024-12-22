<?php

namespace App\Vendors\NewsAPI\Services;

use App\Definitions\BaseDefinition;
use App\Enums\NewsProvidersEnum;
use App\Services\Base\ServiceHelper;
use App\Vendors\NewsAPI\DTOs\NewsAPIArticle;
use App\Vendors\NewsAPI\Repositories\NewsAPISearchRepository;

class NewAPISearchService
{

    private NewsAPISearchRepository $newsAPISearchRepository;

    public function __construct(NewsAPISearchRepository $newsAPISearchRepository)
    {
        $this->newsAPISearchRepository = $newsAPISearchRepository;
    }

    public function search(): void
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
