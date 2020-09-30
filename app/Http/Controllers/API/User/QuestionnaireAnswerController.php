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
