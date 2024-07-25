<?php

namespace App\Services;

use App\Models\QuestionnaireType;
use Illuminate\Support\Facades\Log;

class ScoreInterpretationService
{
    public function getInterpretation(QuestionnaireType $questionnaireType, int $score)
    {
       $scoreRange = $questionnaireType->scoreRanges()
            ->where('min_score', '<=', $score)
            ->where('max_score', '>=', $score)
            ->first();

        if (!$scoreRange) {
            Log::warning("No score range found for score $score in QuestionnaireType ID: {$questionnaireType->id}");
            return [
                'interpretation' => null,
                'interpretation_description' => null
            ];
        }

        return [
            'interpretation' => $scoreRange->interpretation,
            'interpretation_description' => $scoreRange->interpretation_description
        ];
    }
}