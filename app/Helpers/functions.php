<?php

use App\Models\Configuracoes;
use App\Models\Empresa;
use App\Models\Igreja;
use App\Services\EadSimplesService;
use Illuminate\Support\Facades\Auth;

function empresa()
{
    return Auth::user()->empresa;
}

function urlEAD()
{

    $request = request()->getHttpHost();
    $request = str_replace('www.', '', $request);
    $url = $request;

 
    $arrayDomains = [
        "dca.localhost",
    ];
    if (in_array($request, $arrayDomains)) {
        $url = \Request::fullUrl();
        $url = str_replace('https://', '', $url);
        $url = str_replace('http://', '', $url);

        if (\Request::path() != '/') {
            $url = str_replace('/' . \Request::path(), '', $url);
        }
        $url = explode('?', $url);
        $url = $url[0];

        $url = str_replace('//', '', $url);
    }

    return $url;
}
function ead()
{
    return $ead = Empresa::whereHas('configuracoes', function ($q) {
        return $q->where('dominio', urlEAD());
    })->first();
}

function getMoney($value, $moeda = null)
{
    if ($value === null) {
        return '0,00';
    }
    if ($moeda !== null) {
        return $moeda . " " . number_format($value, 2, ',', '.');
    } else {
        return @number_format($value, 2, ',', '.');
    }
}
if (!function_exists('saveMoney')) {
    function saveMoney($value)
    {

        if ($value === null) {
            return 0.00;
        }
        $money = str_replace(".", "", $value);
        $money = str_replace(",", ".", $money);
        return $money;
    }
}
if (!function_exists('eadSimples')) {
    function eadSimples(){
        $eadsimples = empresa()->checkIntegracao('eadsimples');
      

        $service = new EadSimplesService($eadsimples);
       
         return  $service;
      
    }
}