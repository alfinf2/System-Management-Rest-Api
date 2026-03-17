<?php

namespace App\Models;

use App\Models\Score;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'year'
    ];

    public function score()
    {
        return $this->hasMany(Score::class);
    }
}
