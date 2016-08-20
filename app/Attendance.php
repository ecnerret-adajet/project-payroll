<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Attendance extends Model
{
    protected $fillable = [
    	'time_in',
    	'time_out',
    	'break_in',
    	'break_out'
    ];

    protected $dates = [
    	'time_in',
    	'time_out',
    	'break_in',
    	'break_out'
    ];


    public function employees()
    {
        return $this->belongsTo('App\Employee');
    }

    /* set time in value */

    public function setTimeInAttribute($date)
    {
        $this->attributes['time_in'] = Carbon::parse($date)->setTimezone('Asia/Manila');
    }

    public function getTimeInAttribute($date)
    {
        return Carbon::parse($date);
    }

    /* set time out value */

    public function setTimeOutAttribute($date)
    {
        $this->attributes['time_out']=Carbon::parse($date)->setTimezone('Asia/Manila');
    }

    public function getTimeOutAttribute($date)
    {
        return Carbon::parse($date);
    }

    /* set break in value */

    public function setBreakInAttribute($date)
    {
        $this->attributes['break_in']=Carbon::parse($date)->setTimezone('Asia/Manila');
    }

    public function getBreakInAttribute($date)
    {
        return Carbon::parse($date);
    }


    /* set break out value */

    public function setBreakOutAttribute($date)
    {
        $this->attributes['break_out']=Carbon::parse($date)->setTimezone('Asia/Manila');
    }

    public function getBreakOutAttribute($date)
    {
        return Carbon::parse($date);
    }



}
