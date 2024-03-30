<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Answer;
use App\Models\HumanIntelligence;
use App\Models\ActitudeTest;

class Question extends Model
{
    use HasFactory;


    public function answers(){
        return $this->hasMany(Answer::class);
    }

    public function humanIntelligences()
    {
        return $this->belongsTo(HumanIntelligence::class);
    }


    public function actitudesTest()
    {
        return $this->belongsToMany(ActitudeTest::class, 'questions_aptitudes');
    }
}
