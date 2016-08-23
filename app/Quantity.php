<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quantity extends Model
{
	protected $table = 'quantities';

    protected $fillable = [
    	'position',
    	'salary'
    ];

    public function employees(){
    	return $this->belongsToMany('App\Employee');
    }
}
