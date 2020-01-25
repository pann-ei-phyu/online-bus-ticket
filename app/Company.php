<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['phone','logo','address','owner_name','user_id'];
    public function User()
    {
    	return $this->belongsTo('App\User');
    }

    public function c_route()
    {
    	return $this->hasMany('App\C_route');
    }
}
