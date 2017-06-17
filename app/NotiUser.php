<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotiUser extends Model
{
    protected $table = 'noti_user';
    protected $fillable = [
        'user_id', 'noti_id', 'isRead'
    ];
    public $timestamps = false;
}
