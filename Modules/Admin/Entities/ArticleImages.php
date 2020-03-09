<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;

class ArticleImages extends Model
{
    protected $table = 'tblarticel_images';
    protected $guarded = [];
    public $timestamps = false;
}
