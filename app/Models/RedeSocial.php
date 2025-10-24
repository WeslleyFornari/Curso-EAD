<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RedeSocial extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [

        'user_id', 
        'facebook', 
        'twitter',
        'linkedin',
        'youtube',
        'instagram',
        'pinterest',
        'website',

    ];

    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
