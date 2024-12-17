<?php

namespace App\Services;

use App\Repositories\ArticleRepository;
use App\Services\Base\BaseService;

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

}
