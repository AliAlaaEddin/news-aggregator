<?php

namespace App\Services;

use App\Definitions\CategoryDefinition;
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
        string $name,
        string $remoteID
    ) : Category {
        /** @var Category $category */
        $category = $this->repository->create([
            CategoryDefinition::NAME => $name,
            CategoryDefinition::REMOTE_ID => $remoteID
        ]);

        return $category;
    }


}
