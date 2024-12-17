<?php

namespace App\Services;

use App\Repositories\SourceRepository;
use App\Services\Base\BaseService;

/**
 * @property SourceRepository $repository
 */
class SourceService extends BaseService
{

    /**
     * @param SourceRepository $repository
     */
    public function __construct(SourceRepository $repository)
    {
        parent::__construct($repository);
    }

}
