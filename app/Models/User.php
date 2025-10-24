<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Auth;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'empresa_id',
        'status',
        'email_token',
        'api_token',
        'email_verified_at',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function empresa()
    {
        return $this->hasOne(Empresa::class, 'id', 'empresa_id');
    }

    public function dados()
    {
        return $this->hasOne(DadosPessoais::class, 'user_id', 'id');
    }

    public function perfil()
    {
        return $this->hasOne(Perfil::class, 'user_id', 'id');
    }

    public function redes()
    {
        return $this->hasOne(RedeSocial::class, 'user_id', 'id');
    }
    public function pagamento()
    {
        return $this->hasMany(UserPlanos::class, 'user_id', 'id');
    }
    public function hasAccessToCurso($cursoId)
    {
        if(Auth::user()->role == 'admin'){
            return true;
        }

        if (!$this->temPlanoAtivo()) {
            return false;
        }
    
        return $this->pagamento()
            ->whereHas('plano.plano_cursos', function($query) use ($cursoId) {
                $query->where('curso_id', $cursoId);
            })
            ->exists();
    }
    
    public function temPlanoAtivo()
    {
        return $this->pagamento()->where(function ($query) {
            $query->where('status', 'pago')
                ->orWhere(function ($query) {
                    $query->where('status', 'vencer')
                        ->where('data_vencimento', '>', now());
                })
                ->orWhere(function ($query) {
                    $query->where('status', 'cancelado')
                        ->where('data_vencimento', '>', now());
                });
        })->exists();
    }
    public function hasPlano(){
        $planos = Plano::where('empresa_id', Auth::user()->id_empres)->get();
        if($planos){
            return true;
        }
        return false;
    }
    public function hasTrilha(){
        $trilha = Trilha::where('empresa_id', Auth::user()->id_empres)->get();
        if($trilha){
            return true;
        }
        return false;
    }
    public function hasCurso(){
        $plano = Curso::where('empresa_id', Auth::user()->id_empres)->get();
        if($plano){
            return true;
        }
        return false;
    }

}
