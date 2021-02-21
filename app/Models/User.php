<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'ssd','gpa', 'credit','email', 'password','init_password','role_id', 'photo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    public function level()
    {
        return $this->belongsTo('App\Models\Level');
    }

    public function courses()
    {
        return $this->hasMany('App\Models\Course');
    }

    public function prev_courses()
    {
        return $this->belongsToMany('App\Models\Course' , 'Prev_Courses');
    }

    public function tasks()
    {
        return $this->hasMany('App\Models\Task');
    }
}
