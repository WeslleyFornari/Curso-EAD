<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPlanos extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'plano_id',
        'id_pagamento',
        'tipo_pagamento',
        'status',
        'data_vencimento',
    ];
    public function plano()
    {
        return $this->belongsTo(Plano::class, 'plano_id');
    }
}
