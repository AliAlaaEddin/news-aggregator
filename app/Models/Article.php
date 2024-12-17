<?php

namespace App\Models;

use App\Models\Definitions\ArticlesDefinition;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property Source $source
 */
class Article extends Model
{
    use HasUuids,SoftDeletes;

    protected $table = ArticlesDefinition::TABLE_NAME;
    protected $fillable = ArticlesDefinition::FILLABLE;
    protected $casts = ArticlesDefinition::CASTS;

    /**
     * @return BelongsTo
     */
    public function source() : BelongsTo {
        return $this->belongsTo(Source::class, ArticlesDefinition::SOURCE_ID);
    }
}
