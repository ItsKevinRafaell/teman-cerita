<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionAssessments extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function questionnaireType()
    {
        return $this->belongsTo(QuestionnaireType::class);
    }

    public function assessmentResponses()
    {
        return $this->hasMany(AssessmentResponse::class);
    }
}
