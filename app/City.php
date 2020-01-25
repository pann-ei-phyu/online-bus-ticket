<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
     protected $fillable = ['name'];
     
    public function C_route()
    {
    	return $this->belongsTo('App\C_route');
    }
}
