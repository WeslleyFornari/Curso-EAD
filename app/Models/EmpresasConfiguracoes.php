<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpresasConfiguracoes extends Model
{
    use HasFactory;
    protected $fillable = [

        'empresa_id',
        'dominio',
        'media_logo'
    ];

    public function logo()
    {
        return $this->hasOne(Media::class, 'id', 'media_logo');
    }
}
