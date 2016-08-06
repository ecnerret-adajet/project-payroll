<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Announcement extends Model
{
    protected $fillable = [
    	'title',
    	'body',
    	'publish_at'
    ];

    protected $dates = [
    	'publish_at'
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function setPublishAtAttribute($date)
    {
        $this->attributes['publish_at'] = Carbon::parse($date);
    }
    
    public function getPublishAtAttribute($date)
    {
        return Carbon::parse($date)->format('m/d/Y');
    }

}
