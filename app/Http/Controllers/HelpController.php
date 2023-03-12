<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelpController extends Controller
{
    public function help()
    {
        $fornecedores = ['fornecdor 1', 'fornecdor 1', 'fornecdor 1', 'fornecdor 1', 'fornecdor 1'];
        $fornecedor = [
                    0 => ['nome' => 'fornecedor 1', 'status' => 'N', 'cnpj' => '000.000.000', 'estado' => '11', 'telefone' => '123456789'],
                    1 => ['nome' => 'fornecedor 2', 'status' => 'N', 'cnpj' => '', 'estado' => '22', 'telefone' => '987654321'],
                    2 => ['nome' => 'fornecedor 3', 'status' => 'N', 'cnpj' => '000.000.000', 'estado' => '33', 'telefone' => '111111111'],
                ];

        $cnpjMsg = empty($fornecedor[1]['cnpj']) ? 'cnpj não informado' : 'cnpj informado';

        return view('help.help', compact('fornecedores', 'fornecedor', 'cnpjMsg'));
    }
}
