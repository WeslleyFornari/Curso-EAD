<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Modulo;
use Illuminate\Http\Request;

class ModuloController extends Controller
{
    public function delete($id)
    {

        $modulos = Modulo::where('curso_id', $id)->get();

foreach ($modulos as $modulo) {
    $modulo->delete();
}
    }
}
