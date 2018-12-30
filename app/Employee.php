<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
	protected $table = 'employees';    
	protected $primaryKey = 'id';   
   	public $timestamps = true;
	protected $guarded = ['id'];

	public function position()
	{
		return $this->belongsTo('App\Position','jabatan_id');
	}
}