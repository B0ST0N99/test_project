<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionnaireAnswer extends Model
{
    /**
     * @var string[]
     */
    protected $with = ['answersOnQuestions'];

    /**
     * @var array
     */
    protected $fillable = [
        'respondent_ip',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function answersOnQuestions()
    {
        return $this->hasMany(QuestionnaireQuestionAnswers::class);
    }
}
