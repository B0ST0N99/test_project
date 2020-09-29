<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'slug',
    ];

    // RELATIONS

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questionnaireAnswers()
    {
        return $this->hasMany(QuestionnaireAnswer::class);
    }
}
