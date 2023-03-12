<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteContacto extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'telefone', 'email', 'motivo_contactos_id', 'mensagem'];
}
