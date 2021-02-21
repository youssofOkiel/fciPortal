<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'credit', 'code'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function users() //for students
    {
        return $this->belongsToMany('App\Models\User', 'PrevCourses');
    }

    public function major()
    {
        return $this->belongsTo('App\Models\Majors');
    }

    public function lectures()
    {
        return $this->hasMany('App\Models\Lecture');
    }

    public function sections()
    {
        return $this->hasMany('App\Models\Section');
    }

    public function level()
    {
        return $this->belongsTo('App\Models\Level');
    }

}
