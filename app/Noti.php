<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noti extends Model
{
    protected $table = 'noti';
	protected $fillable = [
	   'rec_list',
	   'type',
	   'content'
   ];

    public function users()
    {
        return $this->belongsToMany('App\user');
    }
}
