<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ActitudeTest;
use App\Models\Question;
use App\Models\AcademicOffer;


class HumanIntelligence extends Model
{
    use HasFactory;

    public function actitudTests(){
        return $this->hasMany(ActitudeTest::class);
    }

    public function questions()
    {
        return $this->belongsTo(Question::class);
    }

    public function academicoffers()
    {
        return $this->belongsToMany(AcademicOffer::class, 'academicoffers_humanintelligences');
    }
}
