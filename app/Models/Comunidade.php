<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use App\Models\Pacote;

class Comunidade extends Model
{
    use HasFactory;
    use LogsActivity;


    protected $table = 'comunidades';
    protected $fillable = ['nome','descricao','latitude','longitude','endereço','imagem_principal','imagens_secundarias','video'];

    protected $casts = [
        'imagens_secundarias' => 'array',
    ];


    public function pacotes(){
        return $this->hasMany(Pacote::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly([
            'nome','descricao','latitude','longitude','endereço','imagem_principal','imagens_secundarias','video'
        ]);
    }

}
