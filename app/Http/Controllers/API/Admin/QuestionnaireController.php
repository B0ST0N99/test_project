<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\Controller;
use App\Http\Requests\Questionnaire\QuestionnaireStoreRequest;
use App\Models\Questionnaire;
use Illuminate\Http\JsonResponse;

class QuestionnaireController extends Controller
{
    /**
     * @OA\Get(
     *     path="/admin/questionnaires",
     *     operationId="adminQuestionnaireAll",
     *     tags={"Admins"},
     *     security={{"X-APP-KEY": {}}},
     *     summary="Display a listing of the resource",
     *     @OA\Response(
     *         response="200",
     *         description="Everything is fine"
     *     ),
     * )
     *
     * Display a listing of the questionnaire.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $data = Questionnaire::with('questions')->paginate(10);

        return $this->success('', $data);
    }

    /**
     * @OA\Post(
     *     path="/admin/questionnaires",
     *     operationId="adminQuestionnairesCreate",
     *     tags={"Admins"},
     *     summary="Create questionnaire with question",
     *     security={
     *       {"X-APP-KEY": {}},
     *     },
     *     @OA\RequestBody(
     *         description="Create questionnaire with question",
     *         required=true,
     *         @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(ref="#/components/schemas/QuestionnaireStoreRequest")
     * )
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
     * @OA\Get(
     *     path="/admin/questionnaires/{slug}",
     *
     *     operationId="adminQuestionnaireShow",
     *     tags={"Admins"},
     *     security={{"X-APP-KEY": {}}},
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
     *     @OA\Response(
     *         response="200",
     *         description="Everything is fine"
     *     ),
     *      @OA\Response(
     *         response="404",
     *         description="Not found"
     *     ),
     *     @OA\Response(
     *         response="401",
     *         description="Unauthorized"
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
        $questionnaire->load('questionnaireAnswers');

        return $this->success('', $questionnaire);
    }
}

/**
 * @OA\Schema(
 *      schema="ResponseInvalid",
 *      type="object",
 *      allOf={
 *          @OA\Schema(
 *              @OA\Property(property="message", type="string",example="invalid_request"),
 *              @OA\Property(property="errors", type="string", example="[ ... ]")
 *          )
 *      }
 *  )
 */

/**
 * @OA\Schema(
 *      schema="QuestionnaireStoreRequest",
 *      type="object",
 *      required={"name","questions","questions.*.name"},
 *      allOf={
 *          @OA\Schema(
 *             @OA\Property(property="name", type="string",example="Questionnaire name"),
 *             @OA\Property(property="questions", type="array",
 *                  @OA\Items(
 *                       required={"name"},
 *                       @OA\Property(property="name", type="string", example="Question name"),
 *                  )
 *             ),
 *          )
 *      }
 *  )
 */
