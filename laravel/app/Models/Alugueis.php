<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alugueis extends Model
{
    use HasFactory;

    protected $fillable = [ 'id_locatario', 'id_imovel', 'id_locador', 'periodo', 'preco_final', 'status' ];
}
