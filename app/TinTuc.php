<?php 

namespace App;
use Illuminate\Database\Eloquent\Model;

class TinTuc extends Model
{
	//kết nối dabase
	protected $table = "news";
	//protected $dateFormat = 'd-m-Y';
	public $timestamps = false;	

}
