<?php

namespace App\Services;

use App\Repositories\AuthorRepository;
use App\Services\Base\BaseService;

/**
 * @property AuthorRepository $repository
 */
class AuthorService extends BaseService
{

    /**
     * @param AuthorRepository $repository
     */
    public function __construct(AuthorRepository $repository)
    {
        parent::__construct($repository);
    }

}
