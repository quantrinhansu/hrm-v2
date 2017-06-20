<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notification';
    public function User() 
    {
        return $this->belongsTo('App\User', 'create_by' ,'id');
    }
}
