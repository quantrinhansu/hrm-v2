<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDepartment extends Model
{
    protected $table = 'users_department';
    public $timestamps = false;

    public function User() 
    {
        return $this->belongsTo('App\User', 'user_id' ,'id');
    }
}
