<?php

namespace App\Models\Definitions;

class AuthorDefinition extends BaseDefinition {

    public const TABLE_NAME = 'authors';

    public const NAME = 'name';
    public const BIO = 'bio';
    public const IMAGE_URL = 'image_url';

    public const FILLABLE = [
        self::NAME,
        self::BIO,
        self::IMAGE_URL,
    ];

}
