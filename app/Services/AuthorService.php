<?php

namespace App\Services;

use App\Repositories\AuthorRepository;

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
