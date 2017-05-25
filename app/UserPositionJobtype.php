<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPositionJobtype extends Model
{
    protected $table = 'user_position_jobtype';
    public $timestamps = false;

    public function Position() 
    {
        return $this->belongsTo('App\Position', 'position_id' ,'id');
    }

    public function Jobtype() 
    {
        return $this->belongsTo('App\Jobtype', 'jobtype_id' ,'id');
    }
}
