<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{
    use HasFactory;

    protected $fillable = [
    'Titulo',
    'salario_id',
    'categoria_id',
    'Empresa',
    'fecha',
    'Descripcion',
    'imagen',
    'user_id'
    ];
}
