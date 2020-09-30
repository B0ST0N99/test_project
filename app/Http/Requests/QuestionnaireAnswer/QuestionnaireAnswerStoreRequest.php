<?php

namespace App\Http\Requests\QuestionnaireAnswer;

use Illuminate\Foundation\Http\FormRequest;

class QuestionnaireAnswerStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'questionnaire_id'        => 'required|integer|exists:questionnaires,id',
            'questions'               => 'required|array',
            'questions.*.question_id' => 'required|integer|exists:questions,id',
            'questions.*.answer'      => 'required|string|max:500'
        ];
    }
}
