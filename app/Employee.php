<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Employee extends Model
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
    	'address',
        'date_hired',
        'pagibig-_no',
        'sss_no',
        'salary_type'
    ];

    protected $dates = [
    	'birthdate',
        'date_hired'
    ];

    /* list user table */

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
    
    public function statuses()
    {
        return $this->belongsToMany('App\Status')->withTimestamps();
    }

    public function getStatusListAttribute()
    {
        return $this->statuses->lists('id')->all();
    }

    /* list positions per employee */
    public function positions()
    {
        return $this->belongsToMany('App\Position')->withTimestamps();
    }

    public function getPositionListAttribute()
    {
        return $this->positions->lists('id')->all();
    }


    public function setBirthdateAttribute($date)
    {
        $this->attributes['birthdate'] = Carbon::createFromFormat('Y-m-d', $date);
    }

    public function setDateHiredAttribute($date)
    {
        $this->attributes['date_hired'] = Carbon::createFromFormat('Y-m-d', $date);
    }

}
