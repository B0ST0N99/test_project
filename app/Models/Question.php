<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'name',
    ];

    // RELATIONS

    public function questionnaire()
    {
        return $this->belongsTo(Questionnaire::class);
    }
}
