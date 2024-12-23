<?php

namespace App\Definitions\Pivots;

use App\Definitions\BaseDefinition;

class AuthorArticleDefinition extends BaseDefinition {

    public const TABLE_NAME = 'author_article';

    public const AUTHOR_ID = 'author_id';
    public const ARTICLE_ID = 'article_id';

    public const FILLABLE = [
        self::AUTHOR_ID,
        self::ARTICLE_ID,
    ];

}
