<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    public function lecture()
    {
        return $this->belongsTo('App\Models\Lecture');
    }

    public function materials()
    {
        return $this->morphMany('App\Models\Materials' , 'materiable');
    }
}
