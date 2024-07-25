<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScoreRange extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function questionnaireType()
    {
        return $this->belongsTo(QuestionnaireType::class);
    }
}
