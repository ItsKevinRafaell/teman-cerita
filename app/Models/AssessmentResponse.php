<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssessmentResponse extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table = 'assessment_responses';

    public function assessment()
    {
        return $this->belongsTo(UserAssessment::class);
    }

    public function question()
    {
        return $this->belongsTo(QuestionAssessments::class);
    }

    public function answer()
    {
        return $this->belongsTo(QuestionAnswer::class);
    }
}
