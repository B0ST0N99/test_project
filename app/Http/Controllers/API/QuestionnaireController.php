<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\Questionnaire\QuestionnaireStoreRequest;
use App\Models\Questionnaire;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
    /**
     * Display a listing of the questionnaire.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $data = Questionnaire::with('questions')->get();

        return $this->success('', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param QuestionnaireStoreRequest $request
     * @return JsonResponse
     */
    public function store(QuestionnaireStoreRequest $request)
    {
        /** @var Questionnaire $newQuestionnaire */
        $newQuestionnaire = Questionnaire::query()->create($request->validated());
        $newQuestionnaire->questions = $newQuestionnaire->questions()->createMany($request->questions);

        return $this->created($newQuestionnaire);
    }

    /**
     * Display the specified resource.
     *
     * @param Questionnaire $questionnaire
     * @return JsonResponse
     */
    public function show(Questionnaire $questionnaire)
    {
        $questionnaire->load('questionnaireAnswers');

        return $this->success('', $questionnaire);
    }
}
