<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\API\Controller;
use App\Models\Questionnaire;
use Illuminate\Http\JsonResponse;

class QuestionnaireController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param Questionnaire $questionnaire
     * @return JsonResponse
     */
    public function show(Questionnaire $questionnaire)
    {
        return $this->success('', $questionnaire);
    }
}
