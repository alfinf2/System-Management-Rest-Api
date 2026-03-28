<?php

namespace App\Models;

use App\Models\Score;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function score()
    {
        return $this->hasMany(Score::class);
    }
}
