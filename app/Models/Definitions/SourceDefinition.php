<?php

namespace App\Models\Definitions;

class SourceDefinition extends BaseDefinition {

    public const TABLE_NAME = 'sources';

    public const NAME = 'name';
    public const DESCRIPTION = 'description';
    public const URL = 'url';
    public const REMOTE_ID = 'remote_id';

    public const FILLABLE = [
        self::NAME,
        self::DESCRIPTION,
        self::URL,
        self::REMOTE_ID
    ];


}
