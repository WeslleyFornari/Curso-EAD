<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Modulo extends Model

{
    use HasFactory, SoftDeletes;
   
    protected $fillable = [

        'titulo', 
        'status',
        'empresa_id',
        'ordem',
        'curso_id'

    ];

    protected static function boot()
    {
        parent::boot();

            self::deleting(function ($modulos) {

                $modulos->aulas->each(function ($aula) {
                    $aula->delete();
                });
            });
    }
   
    
    public function aulas(){
        return $this->hasMany(Aula::class, 'modulo_id')->orderBy('ordem', 'asc');
    }
}
