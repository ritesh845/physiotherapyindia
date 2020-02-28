<?php

namespace Modules\Category\Entities;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Category extends Model implements HasMedia
{
    use HasMediaTrait;
    
    protected $guarded = [];

    public function subcategory(){
    	return $this->hasMany('Modules\Category\Entities\Category','parent_cat');
    }
}
