<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class C_route extends Model
{
     protected $fillable = ['company_id','from','to','time','bus_type_id','price','seat'];
    public function from_city()
    {
    	return $this->belongsTo('App\City','from');
    }

    public function to_city()
    {
    	return $this->belongsTo('App\City','to');
    }

    public function company()
    {
    	return $this->belongsTo('App\Company');
    }
    
}
