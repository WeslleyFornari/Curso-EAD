<?php

namespace App\Models;

use App\Scopes\EmpresaScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trilha extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 
        'status', 
        'ordem',
        'empresa_id'
    ];

    protected static function boot(){
         parent::boot();
       return static::addGlobalScope(new EmpresaScope);
    }

    public function cursos()
    {
        return $this->hasMany(Curso::class, 'trilha_id', 'id')->orderBy('ordem', 'asc');;
    }
}
