<?php

namespace App\Models;

use App\Definitions\CategoryDefinition;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasUuids,SoftDeletes;

    protected $table = CategoryDefinition::TABLE_NAME;
    protected $fillable = CategoryDefinition::FILLABLE;


}
