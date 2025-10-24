<?php

namespace App\Models;

use App\Scopes\EmpresaScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plano extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [

        'empresa_id',
        'media_id',
        'name',
        'ordem',
        'preco',
        'descricao',
        'link',
        'status',

    ];
    protected static function boot()
    {
        parent::boot();
        return static::addGlobalScope(new EmpresaScope);
    }

    public function plano_cursos()
    {
        return $this->hasMany(Plano_Cursos::class, 'plano_id', 'id');
    }

    public function midiaDinamica($collum)
    {
        return $this->hasOne(Media::class, 'id', $collum)->first();
    }

    public function image()
    {
        return $this->hasOne(Media::class, 'id', 'media_id');
    }
    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }

}
