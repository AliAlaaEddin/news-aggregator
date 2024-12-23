<?php

namespace App\Models;

use App\Definitions\AuthorDefinition;
use App\Definitions\Pivots\AuthorArticleDefinition;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use HasUuids,SoftDeletes;

    protected $table = AuthorDefinition::TABLE_NAME;
    protected $fillable = AuthorDefinition::FILLABLE;

    /**
     * @return BelongsToMany
     */
    public function articles() : BelongsToMany {
        return $this->belongsToMany(Article::class, AuthorArticleDefinition::TABLE_NAME)->withTimestamps();
    }


}
