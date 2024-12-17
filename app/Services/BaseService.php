<?php

namespace App\Services;

use App\Repositories\BaseRepository;

abstract class BaseService {

    /**
     * @var BaseRepository
     */
    protected BaseRepository $repository;

    /**
     * @param BaseRepository $repository
     */
    public function __construct(BaseRepository $repository) {
        $this->repository = $repository;
    }

}
