<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionnaireType extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function questions()
    {
        return $this->hasMany(QuestionAssessments::class);
    }

    public function assessment()
    {
        return $this->hasMany(Assessment::class);
    }

    public function scoreRanges()
    {
        return $this->hasMany(ScoreRange::class);
    }
}
