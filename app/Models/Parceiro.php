<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Parceiro extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $table = 'parceiros';

    protected $fillable = [
        'nome',
        'logo',
        'seguimento',
        'cargo',
        'responsavel',
        'cnpj',
        'cadastur',
        'email',
        'endereco',
        'cep',
        'mensagem',
        'url',
        'accepted_terms'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly([
            'nome',
            'logo',
            'seguimento',
            'cargo',
            'responsavel',
            'cnpj',
            'cadastur',
            'email',
            'endereco',
            'cep',
            'mensagem',
            'url',
            'accepted_terms'
        ]);
    }
}
