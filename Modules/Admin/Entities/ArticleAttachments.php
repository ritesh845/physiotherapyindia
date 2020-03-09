<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;

class ArticleAttachments extends Model
{
   	protected $table = 'tblarticel_attachments';
    protected $guarded = [];
    public $timestamps = false;
}
