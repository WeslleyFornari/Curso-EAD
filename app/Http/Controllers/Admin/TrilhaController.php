<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Trilha;
use Illuminate\Http\Request;
use Auth;
class TrilhaController extends Controller
{


// INDEX
    public function index(Request $request){
        
        $trilhas = Trilha::orderBy('ordem', 'asc')->paginate(10);

        return view('admin.trilhas.index', compact('trilhas'));
    }

// SALVAR
    public function store(Request $request){

        $data = $request->all();//dd($data);

        $maxOrdem = Trilha::max('ordem');
        $maxOrdem = $maxOrdem ?? 0;
        $data['ordem'] = $maxOrdem + 1;
        $data['empresa_id'] = Auth::user()->empresa_id;
    
        Trilha::create($data);
      
    }
    public function list(){
        $trilhas = Trilha::orderBy('ordem', 'asc')->paginate();

        return view('admin.trilhas._list', compact('trilhas'));
    }

// EDIT
    public function edit(Request $request, $id){
                    
        $trilha = Trilha::find($id);

        return view('admin.trilhas.cadastrar', compact('trilha'));

    }


//UPDATE   
    public function update(Request $request,$id)   {
                
        $data=$request->except('_token');

        Trilha::where('id',$id)->update($data);
        $trilhas = Trilha::paginate(10);

        return view('admin.trilhas._list', compact('trilhas'));
    }


// DELETAR
    public function delete(Request $request,$id)   {

        $trilha = Trilha::find($id);
        $trilha-> delete();
        
        return response()->json(['status' => 'Deletado com sucesso!']);
    }
    

// SELECT STATUS
    public function status(Request $request){

        $data = $request->all();
        
        Trilha::where('id',$data['id'])->update(['status'=> $data['status']]);

        return response()->json([
            'Status' => 'Alterado com sucesso.'
        ]);
    }


// Update Order
    public function updateOrder(Request $request)
    {
        $ordem = $request->input('ordem');
      
        foreach ($ordem as $item) {
            Trilha::where('id', $item['id'])->update(['ordem' => $item['ordem']]);
        }

        return response()->json(['success' => true]);
    }



    

}
