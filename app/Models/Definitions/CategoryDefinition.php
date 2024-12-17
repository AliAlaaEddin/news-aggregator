<?php

namespace App\Models\Definitions;


class CategoryDefinition extends BaseDefinition {

    public const TABLE_NAME = 'categories';

    public const NAME = 'name';
    public const REMOTE_ID = 'remote_id';

    public const FILLABLE = [
        self::NAME,
        self::REMOTE_ID,
    ];

}
