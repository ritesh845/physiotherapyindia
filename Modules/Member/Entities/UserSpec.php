<?php

namespace Modules\Member\Entities;

use Illuminate\Database\Eloquent\Model;

class UserSpec extends Model
{
   	protected $table = 'user_specializations';
	public $timestamps = false;
	protected $guarded = [] ;
 	protected $primaryKey = 'user_id';
 	public $incrementing =false;

 	// public function users(){
 	// 	return $this->belongsToMany('App\User','user_specializations','specialization_id','user_id');
 	// }
 	public function specializations(){
 		return $this->belongsTo('App\Models\Specialization','specialization_id','id');
 	}
}
