<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;

class ArticlesTags extends Model
{
    protected $table = 'tblarticels_tags';
    protected $guarded = [];
    public $timestamps = false;
}
