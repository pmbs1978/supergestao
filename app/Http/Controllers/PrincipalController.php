<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\MotivoContacto;

class PrincipalController extends Controller
{
    public function principal()
    {
        $motivo_contactos = MotivoContacto::all();
        // dd($motivo_contactos);
        return view('site.principal', compact('motivo_contactos'));
    }
}
