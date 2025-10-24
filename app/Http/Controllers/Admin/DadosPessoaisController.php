<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DadosPessoaisUpdateRequest;
use App\Http\Requests\PerfilUpdateRequest;
use App\Models\DadosPessoais;
use App\Models\RedeSocial;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PharIo\Manifest\Author;

class DadosPessoaisController extends Controller
{
    
    public function avatar(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->move(public_path('img/avatar'), $filename);
    
            $dadosPessoais = DadosPessoais::where('user_id', auth()->user()->id)->first();
        
            $dadosPessoais->avatar = 'img/avatar/' . $filename;
            $dadosPessoais->save();
    
            return response()->json(['path' => $dadosPessoais->avatar]);
        }
    
        return response()->json(['error' => 'Nenhum arquivo encontrado.'], 400);
    }

     public function edit(Request $request)
     {
        $titulo = 'Informações Pessoais';
        $sub_titulo = 'Preencha seus principais dados';
        $usuario = Auth::user();

        $acesso = $usuario;
        $dados_pessoais = $usuario->dados;
        $perfil = $usuario->perfil;
        $redes_sociais = $usuario->redes;
        
     
         return view('admin.clientes.index', compact('dados_pessoais', 'titulo', 'sub_titulo', 'perfil', 'redes_sociais', 'acesso'));
      }


    public function update(DadosPessoaisUpdateRequest $request)
    {
        $name = $request->input('name');
        $data = $request->except('_token', 'name');
        $usuario = Auth::user();
     
        User::where('id', $usuario->id)->update(['name' => $name]);
        
        $usuario->dados->update($data);

        return response()->json(['status' => 'Dados pessoais cadastrados com sucesso.']);
    }
}
