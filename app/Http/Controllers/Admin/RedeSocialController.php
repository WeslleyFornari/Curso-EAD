<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RedeSocial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedeSocialController extends Controller
{
   
    public function update(Request $request)
    {
        $data = $request->except('_token');
        $usuario = Auth::user();
        
        RedeSocial::where('user_id', $usuario->id)->update($data);

        return response()->json(['status' => 'Redes cadastradas com sucesso.']);
    }
}
