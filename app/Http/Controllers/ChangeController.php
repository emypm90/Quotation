<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChangeController extends Controller
{
   public function index(){
        $api = Http::get('https://www.dolarsi.com/api/api.php?type=valoresprincipales');
        $cotizacion = $api->json();
        $valor = $cotizacion['0']['casa']['venta'];

        $dolar = $valor;
        $resultado = 10/2;
        

        return view('change', [
            'resultado' => $resultado,
            'dolar' => $dolar,
        ]);
   }

   public function calculate(Request $request){
        $api = Http::get('https://www.dolarsi.com/api/api.php?type=valoresprincipales');
        $cotizacion = $api->json();

        //Dolar oficial
        $ofi = $cotizacion['0']['casa']['venta'];
        $ofi = str_replace(',','.',$ofi);
        $oficial = (float) $ofi;

        //Dolar Blue
        $libre = $cotizacion['1']['casa']['venta'];
        $libre = str_replace(',','.',$libre);
        $blue = (float) $libre;


        $dolar = $oficial;
        $dolarblue = $libre;
        $data = $request->input('cantidad-uno');
        $data = str_replace('$','',$data);
        $input = (float) $data;
        
        if($request->input('roles') != null){
            $vroles = implode(',', $request->input('roles'));
        }

        if($request->input('roles1') != null){
            $vroles1 = implode(',', $request->input('roles1'));
        }

        if($vroles == 'PES' && $vroles1 == 'USD'){
            $total = $input / $dolar;
        }

        if($vroles == 'PES' && $vroles1 == 'USDB'){
            $total = $input / $dolarblue;
        }

        if($vroles == 'USD' && $vroles1 == 'PES'){
            $total = $dolar * $input;
        }

        if($vroles == 'USDB' && $vroles1 == 'PES'){
            $total = $dolarblue * $input;
        }

        if($vroles == 'PES' && $vroles1 == 'PES'){
            $total = $input;
        }

        if($vroles == 'USD' && $vroles1 == 'USD'){
            $total = $input;
        }

        if($vroles == 'USDB' && $vroles1 == 'USDB'){
            $total = $input;
        }

        return view('change', [
            'total' => $total,
            'input' => $input,
            'vroles' => $vroles,
            'vroles1' => $vroles1,
        ]);

        
   }
}
