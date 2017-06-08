<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary_allowance extends Model
{
    protected $table = 'salary_allowance';

    protected $fillable = [
        'user_id', 'allowance_id', 'value'
    ];	 
}
