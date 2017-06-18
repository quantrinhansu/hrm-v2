<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait; // add this trait to your user model
    
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
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function Salary()
    {
        return $this->hasOne('App\Salary', 'user_id', 'id');
    }

    public function Contract()
    {
        return $this->hasOne('App\Contract', 'employee', 'id');
    }
    public function Notis(){
        return $this->belongsToMany('App\Noti');
    }
}
