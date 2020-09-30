<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\Controller;
use App\Models\Questionnaire;
use App\Models\QuestionnaireAnswer;
use Illuminate\Http\JsonResponse;

class StatisticController extends Controller
{
    /**
     * @OA\Get(
     *     path="/admin/statistics/pie-chart",
     *     operationId="adminPieChart",
     *     tags={"Admins"},
     *     security={{"X-APP-KEY": {}}},
     *     summary="Return data for Pie Chart.",
     *     @OA\Response(
     *         response="200",
     *         description="Everything is fine"
     *     ),
     * )
     *
     * Return data for Pie Chart.
     *
     * @return JsonResponse
     */
    public function pieChart()
    {
        /** @var Questionnaire $questionnairesCount */
        $questionnairesCount = Questionnaire::query()->count();

        /** @var QuestionnaireAnswer $questionnaireAnswersCount */
        $questionnaireAnswersCount = QuestionnaireAnswer::query()->count();

        $data = [
            'questionnaires'        => $questionnairesCount,
            'questionnaire answers' => $questionnaireAnswersCount,
        ];

        return $this->success('Pie Chart data', $data);
    }

    /**
     * @OA\Get(
     *     path="/admin/statistics/bar-chart",
     *     operationId="adminBarChart",
     *     tags={"Admins"},
     *     security={{"X-APP-KEY": {}}},
     *     summary="Return data for Bar Chart.",
     *     @OA\Response(
     *         response="200",
     *         description="Everything is fine"
     *     ),
     * )
     *
     * Return data for Bar Chart.
     *
     * @return JsonResponse
     */
    public function barChart()
    {
        /** @var Questionnaire $questionnairesCount */
        $questionnairesWithCountAnswer = Questionnaire::query()->barChart()->get();

        return $this->success('Bar Chart data', $questionnairesWithCountAnswer);
    }
}
