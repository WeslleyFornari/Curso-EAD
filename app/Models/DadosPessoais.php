<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DadosPessoais extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [

        'user_id', 
        'avatar', 
        'sexo',
        'cpf',
        'telefone',
        'celular',
        'cep',
        'endereco',
        'complemento',
        'bairro',
        'estado',
        'pais',

    ];


    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }

    public function midiaDinamica($collum){
        return $this->hasOne(Media::class,'id',$collum)->first();
    }    

}
