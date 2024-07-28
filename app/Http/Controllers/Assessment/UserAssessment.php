<?php

namespace App\Http\Controllers\Assessment;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionAnswerResource;
use App\Http\Resources\AssessmentDetailResource;
use App\Http\Resources\UserAssessmentResource;
use App\Models\QuestionAnswer;
use App\Models\UserAssessment as Assessment ;
use App\Models\AssessmentResponse;
use App\Models\QuestionAssessments;
use App\Models\QuestionnaireType;
use App\Services\ScoreInterpretationService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UserAssessment extends Controller
{
    protected $questionnaireType, $assessment, $questionAssessments, $scoreService, $answer;
    function __construct(QuestionnaireType $questionnaireType, Assessment $assessment, QuestionAssessments $questionAssessments, ScoreInterpretationService $scoreService, QuestionAnswer $questionanswer)
    {
        $this->questionnaireType = $questionnaireType;
        $this->assessment = $assessment;
        $this->questionAssessments = $questionAssessments;
        $this->scoreService = $scoreService;
        $this->answer = $questionanswer;
    }

   function getAllAssessment() {
        $assessmentList = $this->questionnaireType->get(['id', 'name', 'description']);
        return response()->json([
            'assessmentList' => $assessmentList
        ]);
   }

   function createAssessment(Request $request) {

        $validator = Validator::make($request->all(), [
            'questionnaire_type_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->first()
            ]);
        }
        
        $newAssessment = Assessment::create([
            'questionnaire_type_id' => $request->questionnaire_type_id,
            'user_id' => auth()->id(),
            'score' => 0,
        ]);

        $newAssessment->load('questionnaireType');

        $assessment = [
            'id' => $newAssessment->id,
            'questionnaire_type_id' => $newAssessment->questionnaire_type_id,
            'questionnaire_type_name' => $newAssessment->questionnaireType->name,
        ];

        $questions = $this->questionAssessments
            ->where('questionnaire_type_id', $request->questionnaire_type_id)
            ->get(['id', 'content']);

        $answers = $this->answer->get();
        $answers = new QuestionAnswerResource($answers);

        return response()->json([
            'assessment' => $assessment,
            'questions' => $questions,
            'answer_options'  => $answers
        ]);
   }

   function storeAssessment(Request $request) {

        $validator = Validator::make($request->all(), [
            'assessment.id' => 'required',
            'assessment.questionnaire_type_id' => 'required',
            'questions' => 'required|array',
            'questions.*.id' => 'required|integer|exists:question_assessments,id',
            'questions.*.answer_id' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->first()
            ]);
        }

        $assessmentId = $request->json('assessment.id');

        $responses = [];

        foreach ($request->json('questions') as $question) {

              $existingResponse = AssessmentResponse::where('assessment_id', $assessmentId)
                    ->where('question_id', $question['id'])
                    ->first();

                if ($existingResponse) {
                    return response()->json([
                        'message' => 'Duplicate entry for assessments_id and questions_id combination.'
                    ], 400);
                }

            $responses[] = [
                'assessment_id' => $assessmentId,
                'question_id' => $question['id'],
                'answer_id' => $question['answer_id'],
            ];
        }
        AssessmentResponse::insert($responses);

        $this->getScoreAssessment($assessmentId, $request->json('assessment.questionnaire_type_id'));


        return response()->json(['message' => 'Assessment responses saved successfully.'], 201);
   }

   function getUserAsssessment() {
        $userAssessment = Assessment::where('user_id', auth()->id())
            ->with('questionnaireType')
            ->get();
       return new UserAssessmentResource($userAssessment);
   }

   function detailUserAssessment($assessmentId) {
        $detailAssessment =  Assessment::where('id', $assessmentId)
            ->where('user_id', auth()->id())->with('questionnaireType')
            ->with('assessmentResponses.question')
            ->first();
        $scoreDetails = $this->getScoreAssessment($assessmentId);

        $detailAssessment->score = $scoreDetails['score'];
        $detailAssessment->interpretation = $scoreDetails['interpretation'];
        $detailAssessment->interpretation_description = $scoreDetails['interpretation_description'];

        return new AssessmentDetailResource($detailAssessment);
   }

   public function getScoreAssessment($assessmentId)
    {
         $responses = AssessmentResponse::where('assessment_id', $assessmentId)
            ->with('answer')
            ->get();

        $totalScore = $responses->sum(function ($response) {
            return $response->answer ? $response->answer->answer_number : 0;
        });

        $assessment = Assessment::find($assessmentId);
        $assessment->score = $totalScore;
        $assessment->save();

        $interpretation = $this->scoreService->getInterpretation($assessment->questionnaireType, $totalScore);

        return [
            'score' => $totalScore,
            'interpretation' => $interpretation['interpretation'],
            'interpretation_description' => $interpretation['interpretation_description'],
        ];
    }
}
