<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shop extends Model
{
	protected $table = 'shops';    
	protected $primaryKey = 'id';   
   	public $timestamps = true;
	protected $fillable = [
		'nama',
		'distrik',
		'alamat',
		'lamaCust',
		'mulaiCust',
		'listProduk',
		'tipeToko',
		'avgSales',
		'npwporktp',
		'aksesKirim',
		'produkMasuk',
	]; 	
}