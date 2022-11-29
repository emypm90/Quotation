<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WelcomeController extends Controller
{
    public function cotizaciones(){
        $api = Http::get('https://www.dolarsi.com/api/api.php?type=valoresprincipales');
        $cotizacion = $api->json();

        return view('welcome', compact('cotizacion'));
    }
}
