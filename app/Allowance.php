<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Allowance extends Model
{
    protected $table = 'allowance';

    protected $fillable = [
        'name', 'type'
    ];	 
}
