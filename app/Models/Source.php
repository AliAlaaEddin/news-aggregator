<?php

namespace App\Models;

use App\Models\Definitions\ArticlesDefinition;
use App\Models\Definitions\SourceDefinition;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Collection\Collection;

/**
 * @property Collection $collection
 */
class Source extends Model
{
    use HasUuids,SoftDeletes;

    protected $table = SourceDefinition::TABLE_NAME;
    protected $fillable = SourceDefinition::FILLABLE;

    /**
     * @return HasMany
     */
    public function articles(): HasMany {
        return $this->hasMany(Article::class, ArticlesDefinition::SOURCE_ID);
    }


}
