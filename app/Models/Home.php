<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{

    protected $table = 'home';
    protected $fillable = ['titulo_principal','video_principal','titulo_bem_vindo','descricao_bem_vindo',
    'nome_atividade_comunidade1','descricao_atividade_comunidade1','imagem_atividade_comunidade1',
    'nome_atividade_comunidade2','descricao_atividade_comunidade2','imagem_atividade_comunidade2',
    'nome_atividade_comunidade3','descricao_atividade_comunidade3','imagem_atividade_comunidade3',
    'nome_atividade_comunidade4','descricao_atividade_comunidade4','imagem_atividade_comunidade4'];

}
