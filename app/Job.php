<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
    		'date_hired',
    		'pagibig-_no',
    		'sss_no',
    		'salary_type'
    ];

    protected $dates = [
    	'date_hired'
    ];

    public function members()
    {
    	return $this->belongsToMany('App\Member');
    }

    public function positions()
    {
    	return $this->belongsToMany('App\Position')->withTimestamps();
    }

    public function getPositionListAttribute()
    {
    	return $this->positions->lists('id')->all();
    }
}
