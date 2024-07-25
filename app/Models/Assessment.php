<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function questionnaireType()
    {
        return $this->belongsTo(QuestionnaireType::class);
    }

    public function assessmentResponses()
    {
        return $this->hasMany(AssessmentResponse::class);
    }
}
