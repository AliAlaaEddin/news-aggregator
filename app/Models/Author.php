<?php

namespace App\Models;

use App\Definitions\AuthorDefinition;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use HasUuids,SoftDeletes;

    protected $table = AuthorDefinition::TABLE_NAME;
    protected $fillable = AuthorDefinition::FILLABLE;


}
