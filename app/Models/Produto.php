<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'descricao', 'fornecedor_id', 'peso', 'unidade_id'];

    public function produtoDetalhe(){
        return $this->hasOne('App\Models\ProdutoDetalhe', 'fornecedor_id', 'id');

    }
}
