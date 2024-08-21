<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Posts extends Model
{
    use HasFactory;
    use LogsActivity;
    protected $table = 'posts';
    protected $fillable = ['titulo','descricao','conteudo','imagem_principal','imagens_secundarias'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly([
            'titulo','descricao','conteudo','imagem_principal','imagens_secundarias'
        ]);
    }
}
