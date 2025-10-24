<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LayoutController extends Controller
{
    public function index(Request $request, $slug){
        return view('site.'.$slug);
    }
}
