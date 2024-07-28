<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionAnswer extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'question_answers';

    public function assessmentResponses(){
        return $this->hasMany(AssessmentResponse::class, 'answer_id');
    }
}
