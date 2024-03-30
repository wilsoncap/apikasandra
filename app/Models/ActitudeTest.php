<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\HumanIntelligence;
use App\Models\Question;

class ActitudeTest extends Model
{
    use HasFactory;


    public function humanIntelligences()
    {
        return $this->belongsTo(HumanIntelligence::class);
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class, 'questions_aptitudes');
    }
}
