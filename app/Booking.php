<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['route_id','nation_id','seat_no','total_price','dept_date'];
    public function nation()
    {
    	return $this->belongsTo('App\Nation');
    }
    public function C_route()
    {
    	return $this->belongsTo('App\C_route');
    }
    
}
