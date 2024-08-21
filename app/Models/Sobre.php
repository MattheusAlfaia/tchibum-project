<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Sobre extends Model
{
    use HasFactory;
    use LogsActivity;
    protected $table = 'sobre';
    protected $fillable = ['titulo_principal','video_principal','sobre',
    'nome_atividade_comunidade1','descricao_atividade_comunidade1','imagem_atividade_comunidade1',
    'nome_atividade_comunidade2','descricao_atividade_comunidade2','imagem_atividade_comunidade2',
    'nome_atividade_comunidade3','descricao_atividade_comunidade3','imagem_atividade_comunidade3',
    'nome_atividade_comunidade4','descricao_atividade_comunidade4','imagem_atividade_comunidade4'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly([
            'titulo_principal','video_principal','sobre',
            'nome_atividade_comunidade1','descricao_atividade_comunidade1','imagem_atividade_comunidade1',
            'nome_atividade_comunidade2','descricao_atividade_comunidade2','imagem_atividade_comunidade2',
            'nome_atividade_comunidade3','descricao_atividade_comunidade3','imagem_atividade_comunidade3',
            'nome_atividade_comunidade4','descricao_atividade_comunidade4','imagem_atividade_comunidade4'
        ]);
    }
}
