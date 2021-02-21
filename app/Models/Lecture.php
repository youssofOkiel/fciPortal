<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    protected $fillable = ['title', 'VideosUrls'];
    use HasFactory;

    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }

    public function sections()
    {
        return $this->hasMany('App\Models\Section');
    }

    public function materials()
    {
        return $this->morphMany('App\Models\Materials' , 'materiable');
    }
}
