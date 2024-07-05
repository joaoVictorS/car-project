<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    use HasFactory;

    protected $fillable = [
        'marca', 'modelo', 'ano', 'cor', 'placa', 'preco_diaria', 'foto_url', 'empresa_id', 'disponivel'
    ];
}
