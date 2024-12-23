<?php

namespace App\Vendors;

use App\Vendors\Base\DTOs\ArticleDTO;
use App\Vendors\Base\DTOs\CategoryDTO;
use App\Vendors\Base\DTOs\SourceDTO;
use App\Vendors\Base\IBaseNewsProviderServiceInterface;
use Carbon\Carbon;

class NewsProvidersManager {

    /**
     * @var IBaseNewsProviderServiceInterface[]
     */
    protected array $providers = [];

    /**
     * @param IBaseNewsProviderServiceInterface[] $providers
     */
    public function __construct(array $providers)
    {
        $this->providers = $providers;
    }

    /**
     * @return SourceDTO[]
     */
    public function getSources() : array {
        $sources = [];

        foreach ($this->providers as $provider) {
            $sources = array_merge($sources,$provider->getSources());
        }

        return $sources;
    }

    /**
     * @return CategoryDTO[]
     */
    public function getCategories() : array {
        $categories = [];

        foreach ($this->providers as $provider) {
            $categories = array_merge($categories,$provider->getCategories());
        }

        return $categories;
    }

    /**
     * @param Carbon $fromTime
     * @param Carbon $toTime
     * @return ArticleDTO[]
     */
    public function getArticles(Carbon $fromTime, Carbon $toTime) : array {
        $articles = [];

        foreach ($this->providers as $provider) {
            $articles = array_merge($articles,$provider->getArticles($fromTime, $toTime));
        }

        return $articles;
    }

}
