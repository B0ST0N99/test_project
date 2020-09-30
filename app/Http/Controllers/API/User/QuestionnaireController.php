<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\API\Controller;
use App\Models\Questionnaire;
use Illuminate\Http\JsonResponse;

class QuestionnaireController extends Controller
{
    /**
     * @OA\Get(
     *     path="/questionnaires/{slug}",
     *     operationId="questionnaireShow",
     *     tags={"Users"},
     *     summary="Display the specified resource",
     *     @OA\Parameter(
     *          name="slug",
     *          description="Questionnaire slug",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *         response="200",
     *         description="Everything is fine"
     *      ),
     *      @OA\Response(
     *         response="404",
     *         description="Not found"
     *     ),
     * )
     *
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
