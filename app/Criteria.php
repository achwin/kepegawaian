<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Criteria extends Model
{
	protected $table = 'criterias';    
	protected $primaryKey = 'id';   
   	public $timestamps = true;
	protected $guarded = ['id'];
}