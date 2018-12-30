<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Position extends Model
{
	protected $table = 'positions';    
	protected $primaryKey = 'id';   
   	public $timestamps = true;
	protected $guarded = ['id'];
}