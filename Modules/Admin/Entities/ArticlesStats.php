<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;

class ArticlesStats extends Model
{
    protected $table = 'tblarticels_stats';
    protected $guarded = [];
    public $timestamps = false;
}
