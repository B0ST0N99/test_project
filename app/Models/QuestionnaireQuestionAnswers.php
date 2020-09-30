<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionnaireQuestionAnswers extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
      'question_id',
      'answer',
    ];
}
