<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\HumanIntelligence;


class AcademicOffer extends Model
{
    use HasFactory;

    public function humanIntelligences()
    {
        return $this->belongsToMany(HumanIntelligence::class, 'academicoffers_humanintelligences');
    }
}
