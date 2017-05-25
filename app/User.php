<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function UserDepartment()
    {
        return $this->hasOne('App\UserDepartment', 'user_id', 'id');
    }

    public function UserPositionJobtype()
    {
        return $this->hasOne('App\UserPositionJobtype', 'user_id', 'id');
    }

     public function EmployeeRelative()
    {
        return $this->hasOne('App\EmployeeRelative', 'user_id', 'id');
    }
}
