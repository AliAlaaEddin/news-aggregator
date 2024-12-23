<?php

namespace App\Vendors\TheGuardian\Services;

use App\Enums\NewsProvidersEnum;
use App\Vendors\Base\DTOs\ArticleDTO;
use App\Vendors\Base\DTOs\CategoryDTO;
use App\Vendors\Base\DTOs\SourceDTO;
use App\Vendors\Base\IBaseNewsProviderServiceInterface;
use App\Vendors\TheGuardian\DTOs\TheGuardianArticle;
use App\Vendors\TheGuardian\DTOs\TheGuardianSection;
use App\Vendors\TheGuardian\Repositories\TheGuardianSearchRepository;
use App\Vendors\TheGuardian\Repositories\TheGuardianSectionRepository;
use Carbon\Carbon;

class TheGuardianService implements IBaseNewsProviderServiceInterface
{

    private TheGuardianSearchRepository $theGuardianSearchRepository;
    private TheGuardianSectionRepository $theGuardianSectionRepository;

    public function __construct(
        TheGuardianSearchRepository $theGuardianSearchRepository,
        TheGuardianSectionRepository $theGuardianSectionRepository
    )
    {
        $this->theGuardianSearchRepository = $theGuardianSearchRepository;
        $this->theGuardianSectionRepository = $theGuardianSectionRepository;
    }

    /**
     * @return SourceDTO[]
     */
    public function getSources(): array
    {
        return [
            new SourceDTO(
                NewsProvidersEnum::THE_GUARDIAN,
                'The Guardian',
                'Latest US news, world news, sports, business, opinion, analysis and reviews from the Guardian, the world\'s leading liberal voice.',
                'https://www.theguardian.com/',
                NewsProvidersEnum::THE_GUARDIAN->value,
            )
        ];
    }

    /**
     * @return CategoryDTO[]
     */
    public function getCategories(): array
    {
        $sections = $this->theGuardianSectionRepository->getSections();

        return array_map([TheGuardianSection::class,'toCategoryDTO'],$sections);
    }


    /**
     * @return ArticleDTO[]
     */
    public function getArticles(Carbon $fromTime, Carbon $toTime): array
    {
        $articles = $this->theGuardianSearchRepository->search($fromTime);

        $articles = array_filter($articles,function (TheGuardianArticle $article) use ($fromTime){
            return $article->webPublicationDate->isAfter($fromTime);
        });

        return array_map([TheGuardianArticle::class,'toArticleDTO'],$articles);
    }

}
