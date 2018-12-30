<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attendance extends Model
{
   	protected $table = 'attendances';    
   	protected $primaryKey = 'id';   
	public $timestamps = true;
	protected $guarded = ['id'];

	public function employee()
    {
        return $this->belongsTo('App\Employee','nip');
    }
}