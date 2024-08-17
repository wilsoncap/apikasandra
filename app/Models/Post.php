<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Post extends Model
{
    use HasFactory, HasUuids;

    // Definir que la clave primaria es 'id' y que no es autoincremental
    protected $keyType = 'string';
    public $incrementing = false;

    // Especificar los campos que se pueden llenar masivamente
    protected $fillable = [
        'title',
        'content',
    ];
}
