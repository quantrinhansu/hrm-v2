<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $table = 'contract';

    public function User() 
    {
        return $this->belongsTo('App\User', 'employee' ,'id');
    }
}
