<?php

namespace App\Repositories;

use App\Models\Source;

class SourceRepository extends BaseRepository {

    public function __construct(Source $model)
    {
        parent::__construct($model);
    }

}
