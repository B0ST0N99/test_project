<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionnaireAnswer extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'respondent_ip',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questionsWithAnswers()
    {
        return $this->hasMany(QuestionnaireQuestionAnswers::class);
    }
}
