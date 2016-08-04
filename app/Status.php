<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
	protected $table = 'statuses';

    protected $fillable = [
    		'name'
    ];

    public function employees()
    {
    	return $this->belongsToMany('App\Employee');
    }
}
