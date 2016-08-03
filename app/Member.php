<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
    	'first_name',
    	'middle_name',
    	'last_name',
    	'birthdate',
    	'age',
    	'civil_status',
    	'gender',
    	'mobile_no',
    	'telephone',
    	'address'
    ];

    protected $dates = [
    	'birthdate'
    ];

    /* list user table */

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function jobs()
    {
        return $this->belongsToMany('App\Job')->withTimestamp();
    }


    /* create job within member 

    public function getJobListAttribute()
    {
        return $this->jobs->create($request->all());
    }

    */

}
