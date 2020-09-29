<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionnaireQuestionAnswers extends Model
{
    protected $fillable = [
      'question_id',
      'answer',
    ];
}
