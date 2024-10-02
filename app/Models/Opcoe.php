<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pacote;
use App\Models\Comunidade;
use App\Models\PacotePersonalizado;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Opcoe extends Model
{
    use HasFactory;
    use LogsActivity;
    protected $table = 'opcoes';

    protected $fillable = [
        'nome',
        'titulo',
        'descricao',
        'imagem',
        'preco',
        'comunidade_id',
        'por_pessoa',
        'por_grupo',
        'tamanho_grupo'
    ];

    protected $casts = [
        'por_pessoa' => 'boolean',
        'por_grupo' => 'boolean',
    ];

    public function comunidade()
    {
        return $this->belongsTo(Comunidade::class);
    }

    public function pacotes()
    {
        return $this->belongsToMany(Pacote::class, 'pacoteopcoe', 'opcao_id', 'pacote_id');
    }

    public function pacoteperso()
    {
        return $this->belongsToMany(PacotePersonalizado::class, 'pacotepersoopcoe', 'opcaoperso_id', 'pacoteperso_id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly([
            'nome','titulo','descricao','imagem','preco','comunidade_id', 'por_pessoa', 'por_grupo', 'tamanho_grupo'
        ]);
    }

}
