<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserAssessmentResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
         return $this->collection->map(function ($assessment) {
            return [
                'id' => $assessment->id,
                'questionnaire' => [
                    'name' => $assessment->questionnaireType->name,
                    'description' => $assessment->questionnaireType->description,
                ],
                'score' => $assessment->score,
            ];
        });
    }
}
