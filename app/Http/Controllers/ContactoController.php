<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\SiteContacto;
use \App\Models\MotivoContacto;

class ContactoController extends Controller
{
    public function contacto()
    {
        $motivo_contactos = MotivoContacto::all();
        return view('site.contacto', compact('motivo_contactos'));
    }

    public function gravar(Request $request)
    {
        //dd($request);
        // var_dump($_POST);

        // realizar a validação dos dados do formulário recebidos no request
        $regras = [
                // nome => obrigatório | numero minimo de caracteres | numero maximo de craracteres
                'nome' => 'required | min:3 | max:10 | unique:site_contactos',
                'telefone' => 'required',
                'email' => 'email',
                'motivo_contactos_id' => 'required',
                'mensagem' => 'required | max:500'
        ];

        $feedback =  [
                // 'nome.required' => 'O campo nome precisa ser preenchido!',
                'nome.min' => 'O campo nome precisa de ter no minimo 3 caracteres!',
                'nome.max' => 'O campo nome precisa de ter no máximo 10 caracteres!',
                'nome.unique' => 'O campo nome já se encontra em uso!',
                // 'telefone.required' => 'O campo telefone precisa ser preenchido!',
                // 'email.email' => 'O email não está no formato correcto!',
                // 'motivo_contactos.required' => 'O campo motivo contacto precisa ser preenchido!',
                // 'mensagem.required' => 'O campo mensagem precisa ser preenchido!'

                'required' => 'O campo :attribute precisa ser preenchido!',
                'email' => 'O :attribute não está no formato correcto!',
                'max' => 'A mensagem tem mais de 500 caracteres!'
        ];
        $request->validate($regras, $feedback);

        // 1 método
        // SiteContacto::create(
        //     [
        //         'nome' => $request->input('nome'),
        //         'telefone' => $request->input('telefone'),
        //         'email' => $request->input('email'),
        //         'motivo_contacto' => $request->input('motivo_contacto'),
        //         'mensagem' => $request->input('mensagem')
        //     ]
        // );

        // 2 método
        // $contacto = new SiteContacto();
        // $contacto->nome = $request->input('nome');
        // $contacto->telefone = $request->input('telefone');
        // $contacto->email = $request->input('email');
        // $contacto->motivo_contacto = $request->input('motivo_contacto');
        // $contacto->mensagem = $request->input('mensagem');
        // // print_r($contacto->getAttributes());
        // // $contacto->save();

        // 3 método
        // $contacto = new SiteContacto();
        // $contacto->fill($request->all());
        // $contacto->save();

        // 4 método
        // $contacto = new SiteContacto();
        // $contacto->create($request->all());

        // 5 método
        SiteContacto::create($request->all());

        return redirect()->route('site.index');
    }
}
