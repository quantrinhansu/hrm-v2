<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leaves extends Model
{
    protected $table = 'leaves';

    public function User() 
    {
        return $this->belongsTo('App\User', 'user_id' ,'id');
    }
}
