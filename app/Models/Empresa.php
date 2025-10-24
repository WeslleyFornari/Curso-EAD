<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $fillable = [    

        'responsavel',
        'media_id',
        'nome',
        'cpf',
        'cnpj',
        'telefone_1',
        'telefone_2',
        'cep',
        'endereco',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'estado',
        'pais',
        'status',
    ];


    public function user(){

        return $this->hasOne(User::class,'empresa_id','id');
    }

    public function responsavel(){

        return $this->hasOne(User::class,'empresa_id','id')->where('role', 'admin');
    }
    
    public function configuracoes(){

        return $this->hasOne(EmpresasConfiguracoes::class,'empresa_id','id');
    }
    public function midiaDinamica($collum){
        return $this->hasOne(Media::class,'id',$collum)->first();
    }    

    public function image(){
        return $this->hasOne(Media::class,'id','media_id');
    }

    
}
