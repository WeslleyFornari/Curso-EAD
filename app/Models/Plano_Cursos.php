<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plano_Cursos extends Model
{
    use HasFactory;

    protected $table  = 'plano_cursos';

    protected $fillable  = [

    'plano_id',
    'curso_id',
   

    ];

}
