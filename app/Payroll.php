<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Payroll extends Model
{
    protected $fillable = [
        'employee_id',
    	'start_period',
        'end_period',
        'dozen',
        'other_deductions',
        'remarks',
        'payroll_date',
        'gross_net'
    ];

    protected $dates = [
        'start_period',
        'payroll_date',
        'end_period'
    ];

    /* user can create many payroll slips */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /* list period date */

    public function setStartPeriodAttribute($date)
    {
        $this->attributes['start_period'] = Carbon::parse($date);
    }

    public function getStartPeriodAttribute($date)
    {
        return new Carbon($date);
    }

    /* list period date */

    public function setEndPeriodAttribute($date)
    {
        $this->attributes['end_period'] = Carbon::parse($date);
    }

    public function getEndPeriodAttribute($date)
    {
        return new Carbon($date);
    }

    public function setPayrollDateAttribute($date)
    {
        $this->attributes['payroll_date'] = Carbon::parse($date);
    }
    
    public function getPayrollDateAttribute($date)
    {
        return new Carbon($date);
    }


    /* list employees */

    public function employees()
    {
        return $this->belongsToMany('App\Employee')->withTimestamps();
    }

    public function getEmployeeListAttribute()
    {
        return $this->employees->lists('id')->all();
    }

    public function salaries()
    {
        return $this->hasManyThrough('App\Salary', 'App\Employee');
    }

    public function attendances()
    {
        return $this->hasManyThrough('App\Attendance', 'App\Employee');
    }

    public function perdays()
    {
        return $this->hasManyThrough('App\Perdays', 'App\Employee');
    }




}
