<?php

namespace App\Http\Controllers\Admin;

use App\Models\Curso;
use App\Models\Plano;
use App\Models\Trilha;
use Carbon\Carbon;

use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


     
    public function dash()
    {
        $trilhas = Trilha::whereHas('cursos', function($query) {
            $query->whereHas('modulos');
        })->orderBy('ordem', 'asc')->get();  
        $planos = Plano::where('status', 'ativo')->get();
        $empresa = Auth::user()->empresa;
        
      
        return view('admin.dashboard.index', compact('trilhas', 'planos', 'empresa'));
     
       
    }

}