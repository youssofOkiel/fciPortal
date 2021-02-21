<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    protected $fillable = ['title' , 'term'];

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

    public function courses()
    {
        return $this->hasMany('App\Models\Course');
    }


    public function schedule()
    {
        return $this->hasOne('App\Models\Schedule');
    }

    public function announcements()
    {
        return $this->hasMany('App\Models\Announcement');
    }
}
