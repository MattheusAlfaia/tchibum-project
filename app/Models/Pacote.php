<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Opcoe;
use App\Models\User;
use App\Models\Comunidade;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;


class Pacote extends Model
{
    use HasFactory;
    use LogsActivity;
    protected $table = 'pacotes';
    protected $fillable = ['nome','titulo','descricao','imagem_principal','imagens_secundarias','preco','data', 'data_final','infos','video','comunidade_id'];

    protected $casts = [
        'imagens_secundarias' => 'array',
    ];

    public function comunidade()
    {
        return $this->belongsTo(Comunidade::class);
    }

    public function opcoes()
    {
        return $this->belongsToMany(Opcoe::class, 'pacoteopcoe', 'pacote_id', 'opcao_id');
    }


    public function usuario()
    {
        return $this->belongsToMany(User::class, 'pacoteusuarios','pacote_id','user_id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly([
            'nome','titulo','descricao','imagem_principal','imagens_secundarias','preco','data','infos','video','comunidade_id'
        ]);
    }
}
