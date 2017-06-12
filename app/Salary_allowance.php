<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary_allowance extends Model
{
    protected $table = 'salary_allowance';
    public $primaryKey = 'user_id';
    public $timestamps = false;
    protected $fillable = [
        'user_id', 'allowance_id', 'value'
    ];

    public function Allowance() 
    {
        return $this->belongsTo('App\Allowance', 'allowance_id' ,'id');
    }	 
}
