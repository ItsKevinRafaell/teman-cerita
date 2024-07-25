<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AssessmentDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
         return [
            'score' => $this->score,
            'interpretation' => $this->interpretation,            
            'interpretation_description' => $this->interpretation_description,            
            'created_at' => $this->created_at->toDateTimeString(),
            'questionnaire' => [
                'name' => $this->questionnaireType->name,
                'description' => $this->questionnaireType->description,
            ],
            'responses' => $this->assessmentResponses->map(function ($response) {
                return [
                    'question' => $response->question->content,
                    'answer' => $response->answer->content,
                ];
            }),
        ];
    }
}
