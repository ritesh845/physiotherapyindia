<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $table = 'tblarticels';
    protected $guarded = [];
    public $timestamps = false;
}
