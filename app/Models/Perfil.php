<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Perfil extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [

        'user_id', 
        'academico', 
        'experiencia',
        'habilidades',
        'hobby',
        'interesse',
        'aprender',
        'contrato',

    ];

    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
