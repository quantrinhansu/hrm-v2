<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timekeeping extends Model
{
    protected $table = 'timekeeping';

    protected $fillable = [
        'name', 'content',
    ];
}
