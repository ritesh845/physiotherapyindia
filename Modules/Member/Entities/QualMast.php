<?php

namespace Modules\Member\Entities;

use Illuminate\Database\Eloquent\Model;

class QualMast extends Model
{

    protected $table = 'qual_mast';
    public $timestamps = false;
    protected $primaryKey = 'qual_code';
    protected $guarded = [];
   
}
