<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aula extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'aulas';

    protected $fillable = [

      
        'titulo', 
        'link', 
        'ordem',
        'empresa_id',
        'modulo_id',
        'slug'

    ];

   
}
