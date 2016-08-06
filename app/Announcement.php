<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

    public function users()
    {
    	return $this->belongsTo('App\User');
    }


}
