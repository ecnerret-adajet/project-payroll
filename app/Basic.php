<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Basic extends Model
{
    protected $fillable = [
    	'position',
    	'salary'
    ];

    public function employees(){
    	return $this->belongsToMany('App\Employee');
    }
}
