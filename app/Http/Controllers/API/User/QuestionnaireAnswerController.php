<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\API\Controller;
use App\Http\Requests\QuestionnaireAnswer\QuestionnaireAnswerStoreRequest;
use App\Models\Questionnaire;
use App\Models\QuestionnaireAnswer;
use Illuminate\Http\JsonResponse;

class QuestionnaireAnswerController extends Controller
{
    /**
     * @OA\Post(
     *     path="/questionnaire-answers",
     *     operationId="questionnaireStoreAnswers",
     *     tags={"Users"},
     *     summary="Store answer on questions of questionnaire",
     *     @OA\RequestBody(
     *         description="Store answer on questions of questionnaire",
     *         required=true,
     *         @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(ref="#/components/schemas/QuestionnaireAnswerStoreRequest")
     *         )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Everything is fine"
     *     ),
     *     @OA\Response(
     *         response="422",
     *         description="Not found",
     *         @OA\JsonContent(
     *             ref="#/components/schemas/ResponseInvalid"
     *         )
     *     ),
     *     @OA\Response(
     *         response="401",
     *         description="Unauthorized"
     *     ),
     * )
     *
     * Store a newly created resource in storage.
     *
     * @param QuestionnaireAnswerStoreRequest $request
     * @return JsonResponse
     */
    public function store(QuestionnaireAnswerStoreRequest $request)
    {
        $data = $request->validated();

        /** @var Questionnaire $questionnaire */
        $questionnaire = Questionnaire::query()->findOrFail($data['questionnaire_id']);

        if ($questionnaire->questions->count() != count($data['questions'])) {
            return $this->invalidate('did not answer all the questions', 'questions');
        }

        /** @var QuestionnaireAnswer $questionnaireAnswer */
        $questionnaireAnswer = $questionnaire->questionnaireAnswers()->create(['respondent_ip' => $request->ip()]);
        $answers = $questionnaireAnswer->answersOnQuestions()->createMany($data['questions']);

        $questionnaireAnswer->answersOnQuestions = $answers;

        return $this->success('', $questionnaireAnswer);
    }
}

/**
 * @OA\Schema(
 *      schema="QuestionnaireAnswerStoreRequest",
 *      type="object",
 *      required={"name","questions","questions.*.name"},
 *      allOf={
 *          @OA\Schema(
 *             @OA\Property(property="questionnaire_id", type="integer",example="1"),
 *             @OA\Property(property="questions", type="array",
 *                  @OA\Items(
 *                       required={"question_id","answer"},
 *                       @OA\Property(property="question_id", type="integer", example="1"),
 *                       @OA\Property(property="answer", type="string", example="Answer"),
 *                  )
 *             ),
 *          )
 *      }
 *  )
 */
