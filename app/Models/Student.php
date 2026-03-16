<?php

namespace App\Models;

use App\Models\ClassRoom;
use App\Models\Score;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    


    public function class()
    {
        return $this->belongsTo(ClassRoom::class);
    }

    public function score()
    {
        return $this->hasMany(Score::class);
    }

}
