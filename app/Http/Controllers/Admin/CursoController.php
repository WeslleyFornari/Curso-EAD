<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Aula;
use App\Models\Curso;
use App\Models\Modulo;
use App\Models\Plano;
use App\Models\Plano_Cursos;
use App\Models\Trilha;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;
use Illuminate\Support\Str;




class CursoController extends Controller
{
    
// INDEX
    public function index(Request $request){
            
        $cursos = Curso::orderBy('ordem', 'asc')->paginate(10);
        $trilhas = Trilha::orderBy('ordem', 'asc')->get();
        $planos = Plano::orderBy('ordem', 'asc')->get();
        if($request->trilha){
            $cursos = Curso::where('trilha_id',$request->trilhas)->orderBy('ordem', 'asc')->paginate(10);

        }

        return view('admin.cursos.index', compact('cursos', 'trilhas', 'planos'));
    }

    
// SALVAR
    public function store(Request $request){
 
        $data = $request->all();//  dd($data);
        
        $maxOrdem = Curso::max('ordem');
        $maxOrdem = $maxOrdem ?? 0;
        $data['ordem'] = $maxOrdem + 1;

        $data['empresa_id'] = Auth::user()->empresa_id;

        $curso = Curso::create($data);

        $curso->refresh();

        $planos = $request->get('planos');

        foreach($planos as $k => $plano)
        {
            Plano_Cursos::create([

                'plano_id' => $plano,
                'curso_id' => $curso->id
            ]);
        }
        
       
        
        return response()->json(['curso_id' => $curso->id]);
    }

    
// EDIT
    public function edit(Request $request, $id){
                        
        $curso = Curso::find($id);
        $planosIds = $curso->curso_planos->pluck('plano_id')->toArray(); // dd($planosIds);
        $planos = Plano::all();
       
        return view('admin.cursos.edit', compact('curso', 'planosIds', 'planos'));
    }


// UPDATE   
    public function update(Request $request, $id)   {

        $data = $request->except('_token'); 
     
        $empresa_id = Auth::user()->empresa_id;

        $slug = Str::slug($data['titulo'], '-' );

        Curso::where('id', $id)->update([

            'titulo' => $data['titulo'],
            'descricao' => $data['descricao'],
            'slug' => $slug,
            'media_id' => $data['media_id']
        ]);

        Plano_Cursos::where('curso_id', $id)->delete();

        $planos = $request->get('planos');

        foreach($planos as $k => $plano)
        {
            Plano_Cursos::create([

                'plano_id' => $plano,
                'curso_id' => $id
            ]);
        }

   
        $modulos = $request->input('modulos');

        if(isset($modulos))
        {
 
            foreach ($modulos as $k => $modulo) {
                
                if(empty($modulo['id'])){
                    $modulo_salvo = Modulo::create([
                        'titulo' => $modulo['titulo'],
                        'curso_id' => $id,
                        'empresa_id' => $empresa_id,
                        'ordem' => $k,
                        'status' => $aula['status'],
                    ]);
                    $modulo_salvo =  $modulo_salvo->id;
                }else{
                    $modulo_salvo = $modulo['id'];
                    Modulo::where('id',$modulo['id'])->update([
                        'titulo' => $modulo['titulo'],
                        'status' => $modulo['status'],
                        'ordem' => $k
                    ]);
                }
              
            
                    foreach ($modulo['aulas'] as $q => $aula) {

                       

                        if(empty($aula['id'])){
                            Aula::create([
                                'titulo' => $aula['titulo'],
                                'link' => $aula['link'],
                                'modulo_id' => $modulo_salvo,
                                'empresa_id' => $empresa_id,
                                'status' => $aula['status'],
                                'ordem' => $q
                            ]);
                        }else{
                            Aula::where('id',$aula['id'])->update([
                                'titulo' => $aula['titulo'],
                                'link' => $aula['link'],
                                'status' => $aula['status'],
                                'ordem' => $q
                            ]);
                        }   
                        
                        if( $aula['status'] == 'deletar'){
                           
                            Aula::where('modulo_id',$aula['id'])->delete();
                        }
                    }
            }

            if( $modulo['status'] == 'deletar'){
                Modulo::where('id',$modulo['id'])->delete();
                Aula::where('modulo_id',$modulo['id'])->delete();
            }
        }

        $modulos = $request->input('modulo_novo');

        if(isset($modulos))
        {

        }

        return response()->json(['status' => 'Curso, modulos e aulas atualizados.']);
       
    }


    public function delete(Request $request, $id)
    {

        $curso = Curso::find($id);
        $curso->delete();

        return response()->json(['status' => 'Curso Deletado com sucesso']);
    }

   
    public function preview(Request $request, $slug){
                      // dd($slug) ;
        $curso = Curso::where('slug', $slug)->first();// dd($curso);
        
        return view('admin.dashboard.curso', compact('curso'));
    }

    public function getAula(Request $request, $id){
                
        $aula = Aula::find($id);
//dd($aula);
        return response()->json($aula);
    }


    public function getVideoId($link)
    {
        // Explode formato ?v
        $link_formato_1 = explode("?v",$link);
        // Checa se o formato ?v existe se existir retorna o id
        if(is_array($link_formato_1)) {
           return $link_formato_1[1];
        // Senao ele tenta outro formato
        } else {
           // Explode formato .be/
           $link_formato_2 = explode(".be/",$link);
 
           // Checa se o formato link e .be se existir retorna o id
           if(is_array($link_formato_2)) {
             return $link_formato_2[1];
           // se não retorna false (link nao existente);
           } else {
             return false;
           }
        }
    }

    
// Update Order
    public function updateOrder(Request $request)
    {
        $ordem = $request->input('ordem');
    //dd($ordem);
        foreach ($ordem as $item) {
            Curso::where('id', $item['id'])->update(['ordem' => $item['ordem']]);
        }

        return response()->json(['success' => true]);
    }
}
