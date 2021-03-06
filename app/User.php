<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
     use EntrustUserTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function employees()
    {
        return $this->hasOne('App\Employee');
    }


    public function announcements()
    {
        return $this->hasMany('App\Announcement');
    }

    public function payrolls()
    {
        return $this->hasMany('App\Payroll');
    }

    public function perdays()
    {
        return $this->hasMany('App\Perday');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }


}
