<?php

namespace App\Models;

use App\Models\Traits\Slugable;
use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    use Slugable;

    /**
     * @var string[]
     */
    protected $with = ['questions'];

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'slug',
    ];

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

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
