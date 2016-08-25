<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
	protected $table = 'salaries';
	
    protected $fillable = [
    	'basic_pay',
    	'meal_allowance',
    	'transportation'
    ];

    public function employees()
    {
    	return $this->belongsTo('App\Employee','employee_id','id');
    }
}
