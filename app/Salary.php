<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $table = 'salary';

    protected $fillable = [
        'user_id', 'base_salary', 'insurrance_salary','allowance_id','overtime_id','advance'
    ];	    
}
