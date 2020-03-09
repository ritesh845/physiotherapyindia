<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;

class ArticlesRevisions extends Model
{
    protected $table = 'tblarticels_revisions';
    protected $guarded = [];
    public $timestamps = false;
}
