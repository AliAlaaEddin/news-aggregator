<?php

namespace App\Services;

use App\Definitions\CategoryDefinition;
use App\Enums\NewsProvidersEnum;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use App\Services\Base\BaseService;


/**
 * @property CategoryRepository $repository
 */
class CategoryService extends BaseService {

    /**
     * @param CategoryRepository $repository
     */
    public function __construct(CategoryRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * @param string $name
     * @param string $remoteID
     * @return Category
     */
    public function addCategory(
        NewsProvidersEnum $provider,
        string $name,
        string $remoteID,
    ) : Category {
        /** @var Category $category */
        $category = $this->repository->create([
            CategoryDefinition::NAME => $name,
            CategoryDefinition::REMOTE_ID => $remoteID,
            CategoryDefinition::PROVIDER => $provider
        ]);

        return $category;
    }

    /**
     * @param NewsProvidersEnum $newsProvider
     * @param string|null $remoteID
     * @return Category|null
     */
    public function getCategoryByRemoteID(NewsProvidersEnum $newsProvider, ?string $remoteID) : ?Category
    {
        /** @var ?Category $category */
        $category = $this->repository
            ->where(CategoryDefinition::REMOTE_ID, $remoteID)
            ->where(CategoryDefinition::PROVIDER, $newsProvider)
            ->first();

        return $category;
    }

}
