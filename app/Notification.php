<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'noti';
    public function User() 
    {
        return $this->belongsTo('App\User', 'create_by' ,'id');
    }
}
