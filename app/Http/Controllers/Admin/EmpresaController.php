<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmpresaRequest;
use App\Http\Requests\EmpresaUpdateRequest;
use App\Models\Empresa;
use App\Models\EmpresasConfiguracoes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmpresaController extends Controller
{

    // public function index()
    // {
    //     if (Auth::User()->role == "master") {

    //         $empresas = Empresa::paginate(5);
    //     }

    //     if (Auth::User()->role == "admin") {

    //         $empresa_id = Auth::User()->empresa_id;
    //         $empresas = Empresa::where('empresa_id', $empresa_id)->paginate(5);
    //     }

    //     return view('admin.empresas.index', compact('empresas'));
    // }


    public function store(EmpresaRequest $request)
    {
        $data = $request->except('token');

        $empresa = Empresa::create([

            'nome' => $data['nome'],
            'telefone_1' => $data['telefone_1'],
        ]);

        $empresa->refresh();

        User::create([

            'name' => $data['name'],
            'empresa_id' => $empresa->id,
            'email' => $data['email'],
            'role' => 'admin',
            'password' => Hash::make($data['password']),
        ]);

        return response()->json(['status' => 'Empresa cadastrada com sucesso!']);
    }


    public function edit(Request $request)
    {
        $empresa_id = Auth::user()->empresa_id;
        $empresa = Empresa::where('id', $empresa_id)->first();

        return view('admin.empresas.edit', compact('empresa'));
    }


    public function update(EmpresaUpdateRequest $request, $id)
    {
        $data = $request->except('_token');

        Empresa::where('id', $id)->update([

            'nome' => $data['nome'],
            'telefone_1' => $data['telefone_1'],
            'media_id' => $data['media_id'],
        ]);

        EmpresasConfiguracoes::where('id', $id)->update([

            'media_logo' => $data['media_id'],
        ]);

        User::where('empresa_id', $id)->where('role', 'admin')->update([

            'name' => $data['responsavel'],
            'email' => $data['email'],
            'role' => 'admin',
            //'password' => Hash::make($data['password']),
        ]);

        return response()->json(['status' => 'Empresa atualizada com sucesso!']);
    }
}
