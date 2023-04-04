<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $fillable = ['cliente_id'];

    public function clientes(){
        return $this->belongsTo('App\Models\Cliente', 'cliente_id', 'id');
    }

    public function produtos(){
        // return $this->belongsToMany('App\Models\Produto', 'pedido_produtos');

        return $this->belongsToMany('App\Models\Item', 'pedido_produtos', 'pedido_id', 'produto_id')->withPivot('id', 'created_at');
        /*
            1- Modelo de relacionamento N para N em relação ao modelo que estamos a implementar
            2- É a tabela auxiliar que contém os registos de relacionamento
            3- Representa o nome da foreign key da tabela mapeada pelo modelo na tabela de relacionamento
            4- Representa o nome da foreign key da tabela mapeada pelo modelo utelizado no relacionamento implementado
        */
    }
}
