<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// se tipar o retorno da função do tipo view
use Illuminate\View\View;

class TesteController extends Controller
{
    public function teste(string $nome, string $apelido): View
   {
    // echo "O seu nome é $nome e o seu apelido é $apelido";

    // encaminhar parametros atraves de array associativo
    //return view('teste', ["nome" => $nome, "apelido" => $apelido]);

    // encaminhar parametros atraves do metodo compact() nativo do php
    //return view('teste', compact('nome', 'apelido'));

    // encaminhar parametros atraves do metodo with() nativo do laravel
    return view('teste')->with('nome', $nome)->with('apelido', $apelido);
   } 
}
