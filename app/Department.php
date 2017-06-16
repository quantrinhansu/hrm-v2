<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';

    public function UserDepartment()
    {
        return $this->hasOne('App\UserDepartment', 'department_id', 'id');
    }
}
