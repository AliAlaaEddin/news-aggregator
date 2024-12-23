<?php

namespace App\Models;

use App\Definitions\ArticleDefinition;
use App\Definitions\Pivots\AuthorArticleDefinition;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property Source $source
 */
class Article extends Model
{
    use HasUuids,SoftDeletes;

    protected $table = ArticleDefinition::TABLE_NAME;
    protected $fillable = ArticleDefinition::FILLABLE;
    protected $casts = ArticleDefinition::CASTS;

    /**
     * @return BelongsTo
     */
    public function source() : BelongsTo {
        return $this->belongsTo(Source::class, ArticleDefinition::SOURCE_ID);
    }

    /**
     * @return BelongsToMany
     */
    public function authors() : BelongsToMany {
        return $this->belongsToMany(Author::class, AuthorArticleDefinition::TABLE_NAME)->withTimestamps();
    }
}
