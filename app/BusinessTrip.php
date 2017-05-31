<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessTrip extends Model
{
    protected $table = 'business_trip';

    public function User() 
    {
        return $this->belongsTo('App\User', 'user_id' ,'id');
    }
}
