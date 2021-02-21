<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materials extends Model
{
    protected $fillable=['title','path'];

    use HasFactory;

    public function materiable()
    {
        return $this->morphTo();
    }
}
