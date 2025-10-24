<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plano;
use App\Models\Plano_Cursos;
use App\Models\Trilha;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlanoController extends Controller
{
    
    
// INDEX
    public function index(Request $request){
            
        $planos = Plano::orderBy('ordem', 'asc')->paginate(3);

        return view('admin.planos.index', compact('planos'));
    }

// STORE
    public function store(Request $request){

        $data = $request->all();
//dd($data);
        $maxOrdem = Plano::max('ordem');
        $maxOrdem = $maxOrdem ?? 0;
        $data['ordem'] = $maxOrdem + 1;

        $data['empresa_id'] = Auth::user()->empresa_id;

        $data['preco'] = saveMoney($data['preco']);

        $plano = Plano::create($data);

        $plano->refresh();
        
        return response()->json(['plano_id' => $plano->id]);
    }


// EDIT
    public function edit(Request $request, $id){
                       
        $plano = Plano::find($id); // dd($plano->plano_cursos);

    //     $cursosIds = $plano->plano_cursos->map(function($planoCurso) {
    //         return $planoCurso->curso_id;
    //     })->toArray();

        $cursosIds = $plano->plano_cursos->pluck('curso_id')->toArray(); 
    
        $trilhas = Trilha::orderBy('ordem', 'asc')->get();
        
        return view('admin.planos.edit', compact('plano', 'trilhas', 'cursosIds'));
    }
    

// UPDATE   
    public function update(Request $request, $id)   {

        $data = $request->except('_token','cursos'); 
  
        $data['empresa_id'] = Auth::user()->empresa_id;
        $data['preco'] = saveMoney($data['preco']);

        Plano::where('id', $id)->update($data);
      
        Plano_Cursos::where('plano_id', $id)->delete();

        $cursos = $request->input('cursos',[]);

       
        if(isset($cursos))
        {
            foreach($cursos as $k => $curso)
            {
                Plano_Cursos::create([

                    'plano_id' => $id,
                    'curso_id' => $curso
                ]);
            }
        }

        return response()->json(['status' => 'Plano atualizados.']);
    
    }


// Delete
    public function delete(Request $request, $id)
    {
        Plano_Cursos::where('plano_id', $id)->delete();
        Plano::where('id', $id)->delete();
      
        return response()->json(['status' => 'Plano Deletado com sucesso']);
    }

// Update Order
    public function updateOrder(Request $request)
    {
        $ordem = $request->input('ordem');
    //dd($ordem);
        foreach ($ordem as $item) {
            Plano::where('id', $item['id'])->update(['ordem' => $item['ordem']]);
        }

        return response()->json(['success' => true]);
    }

}
