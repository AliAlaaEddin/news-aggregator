<?php

namespace App\Definitions;

class AuthorDefinition extends BaseDefinition {

    public const TABLE_NAME = 'authors';

    public const NAME = 'name';
    public const BIO = 'bio';
    public const IMAGE_URL = 'image_url';
    public const REMOTE_ID = 'remote_id';

    public const FILLABLE = [
        self::NAME,
        self::BIO,
        self::IMAGE_URL,
        self::REMOTE_ID
    ];

}
