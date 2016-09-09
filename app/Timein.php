<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Timein extends Model
{
    protected $fillable = [
    	'time_in'
    ];

    public function employees()
    {
    	return $this->belongsToMany('employees');
    }

    public function setTimeInAttribute($date)
    {
        $this->attributes['time_in'] = Carbon::now()->format('Y-m-d H:i:s');
    }

    public function getTimeInAttribute($date)
    {
        return Carbon::parse($date);
    }
}
