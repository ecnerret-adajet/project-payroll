<?php

namespace App;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


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
        'pagibig_no',
        'sss_no',
        'avatar',
        'salary_type'
    ];

    protected $dates = [
    	'birthdate',
        'date_hired'
    ];

    /* list user table */

    public function setBirthdateAttribute($date)
    {
          $this->attributes['birthdate'] = Carbon::parse($date);
    }

    public function getBirthdateAttribute($date)
    {
         return new Carbon($date);
    }


    public function setDateHiredAttribute($date)
    {
         $this->attributes['date_hired'] = Carbon::parse($date);
    }

    public function getDateHiredAttribute($date)
    {
            return new Carbon($date);
    }



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



    /* list attendance to employees table */

    public function attendance()
    {
        return $this->hasOne('App\Attendance');
    }

    /* list payroll's employee */

    public function payrolls()
    {
        return $this->hasOne('App\Payroll','employee_id','id');
    }





  



}
