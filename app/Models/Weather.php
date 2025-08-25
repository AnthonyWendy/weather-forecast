<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    use HasFactory;

    protected $fillable = [
        'cidade',
        'pais',
        'temperatura',
        'descricao',
        'icone',
        'umidade',
        'vento',
        'pressao',
        'sensacao',
        'cloudcover',
        'uv_index',
        'sunrise',
        'sunset',
        'air_quality'
    ];

    protected $casts = [
        'air_quality' => 'array',
    ];
}
