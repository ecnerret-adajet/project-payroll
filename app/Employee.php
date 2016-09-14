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

    public function getFullNameAttribute()
    {
        return ucfirst($this->first_name) .' ' . ucfirst($this->last_name);
    }

    /* list user table */


    public function getBirthdateAttribute($date)
    {
         return Carbon::parse($date)->format('m/d/Y');
    }

     public function getDateHiredAttribute($date)
    {
         return Carbon::parse($date)->format('m/d/Y');
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

    /* list basic position per employee */
    public function basics()
    {
        return $this->belongsToMany('App\Basic')->withTimestamps();
    }

    public function getBasicListAttribute()
    {
        return $this->basics->lists('id')->all();
    }

    /* list quantity position per employee */
    public function quantities()
    {
        return $this->belongsToMany('App\Quantity')->withTimestamps();
    }

    public function getQuantityListAttribute()
    {
        return $this->quantities->lists('id')->all();
    }



    /* list attendance to employees table */

    public function attendances()
    {
        return $this->belongsToMany('App\Attendance');
    }

    /* list salaries employee */

    public function salaries()
    {
        return $this->hasOne('App\Salary','employee_id','id');
    }

    /* get employee to perday stats */
    public function perdays()
    {
        return $this->belongsToMany('App\Perday');
    }


    /* list all payroll data to employees */
    public function payrolls()
    {
        return $this->belongsToMany('App\Payroll');
    }

    /*attendance time in record */

   public function timeins()
    {
        return $this->belongsToMany('App\Timein')->withTimestamps();
    }

    public function getTimeInAttribute()
    {
        return $this->timeins->lists('id')->all();
    }


    public function timeouts()
    {
        return $this->belongsToMany('App\Timeout')->withTimestamps();
    }

    public function getTimeOutAttribute()
    {
        return $this->timeouts->lists('id')->all();
    }








  



}
