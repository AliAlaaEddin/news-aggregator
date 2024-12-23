<?php

namespace App\Definitions;

class ArticleDefinition extends BaseDefinition {

    public const TABLE_NAME = 'articles';

    public const TITLE = 'title';
    public const CONTENT = 'content';
    public const URL = 'url';
    public const PUBLISHED_AT = 'published_at';
    public const SOURCE_ID = 'source_id';
    public const CATEGORY_ID = 'category_id';
    public const PROVIDER = 'provider';

    public const FILLABLE = [
        self::TITLE,
        self::CONTENT,
        self::URL,
        self::PUBLISHED_AT,
        self::SOURCE_ID,
        self::CATEGORY_ID,
        self::PROVIDER,
    ];

    public const CASTS = [
        self::PUBLISHED_AT => 'date',
    ];

}
