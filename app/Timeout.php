<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Timeout extends Model
{
     protected $fillable = [
    	'time_out'
    ];

    public function employees()
    {
    	return $this->belongsToMany('employees');
    }

       public function setTimeOutAttribute($date)
    {
        $this->attributes['time_out']= Carbon::now()->format('Y-m-d H:i:s');
    }

    public function getTimeOutAttribute($date)
    {
        return Carbon::parse($date);
    }
}
