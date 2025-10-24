<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PerfilUpdateRequest;
use App\Models\Perfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    
    // public function edit(Request $request)
    // {
    //     $titulo = 'Perfil';
    //     $sub_titulo = 'Fale um pouco mais sobre você';
    //     $perfil = Perfil::where('user_id', Auth::user()->id)->first();

    //     return view('admin.clientes._perfil', compact('perfil', 'titulo', 'sub_titulo'));
    // }

    
    public function update(PerfilUpdateRequest $request)
    {
        $data = $request->except('_token');
        $usuario = Auth::user();
  
        Perfil::where('user_id', $usuario->id)->update($data);

        return response()->json(['status' => 'Perfil cadastrado com sucesso.']);
    }

}
