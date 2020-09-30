<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
    ];

    // RELATIONS

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function questionnaire()
    {
        return $this->belongsTo(Questionnaire::class);
    }
}
