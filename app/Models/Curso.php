<?php

namespace App\Models;

use App\Scopes\EmpresaScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Curso extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [

        'media_id',
        'trilha_id',
        'empresa_id',
        'titulo', 
        'ordem',
        'descricao',
        'status', 
        'slug'

    ];

    

    protected static function boot()
    {
        parent::boot();

            self::deleting(function ($curso) {
             
                Modulo::whereIn('id',$curso->modulos->pluck('id'))->delete();     
            });
   
    
      return static::addGlobalScope(new EmpresaScope);
   }
    
    public function trilha(){
        return $this->hasOne(Trilha::class,'id','trilha_id');
    }

    public function midiaDinamica($collum){
        return $this->hasOne(Media::class,'id',$collum)->first();
    }    

    public function image(){
        return $this->hasOne(Media::class,'id','media_id');
    }

    public function modulos(){
        return $this->hasMany(Modulo::class, 'curso_id')->orderBy('ordem', 'asc');
    }

    public function curso_planos()
    {
         return $this->hasMany(Plano_Cursos::class, 'curso_id', 'id');
    }
    
  
}
