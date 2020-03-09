<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;

class ArticlesSchedule extends Model
{
    protected $table = 'tblarticels_schedule';
    protected $guarded = [];
    public $timestamps = false;
}
