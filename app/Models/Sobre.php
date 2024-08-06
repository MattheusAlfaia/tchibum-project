<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sobre extends Model
{
    protected $table = 'sobre';
    protected $fillable = ['titulo_principal','video_principal','sobre',
    'nome_atividade_comunidade1','descricao_atividade_comunidade1','imagem_atividade_comunidade1',
    'nome_atividade_comunidade2','descricao_atividade_comunidade2','imagem_atividade_comunidade2',
    'nome_atividade_comunidade3','descricao_atividade_comunidade3','imagem_atividade_comunidade3',
    'nome_atividade_comunidade4','descricao_atividade_comunidade4','imagem_atividade_comunidade4'];

}
