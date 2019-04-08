<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Customer extends Authenticatable
{
	use Notifiable;
	protected $guard = 'customer';
    protected $table = "customer";
    protected $fillable = [
        'email', 'password',
    ];
    // protected $fillable = [
    //     'name', 'email', 'password',
    // ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function bill(){
    	return $this->hasMany('App\Bill','id_customer','id');
    }
}
