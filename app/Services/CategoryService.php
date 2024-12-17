<?php

namespace App\Services;

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



}
