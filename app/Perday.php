<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Perday extends Model
{
    protected $fillable = [
    	'quantity',
    	'total_quantity',
    	'publish_date',
    ];

    protected $date = [
    	'publish_date'
    ];

    /* list user created */
    public function user()
    {
    	return $this->belonsTo('App\User');
    }

    /* format date */
    public function setPublishDateAttribute($date)
    {
    	 $this->attributes['publish_date'] = Carbon::parse($date);
    }

    public function getPublishDateAttribute($date)
    {
    	return new Carbon($date);
    }

   	/* list employees per day record */
    public function employees()
    {
    	return $this->belongsToMany('App\Employee')->withTimestamps();
    }

    public function getEmployeeListAttribute()
    {
    	return $this->employees->lists('id')->all();
    }

}
