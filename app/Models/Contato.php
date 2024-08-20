<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Contato extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $table = 'contatos';
    protected $fillable = ['imagem_principal','whatsapp','email'];


    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly([
            'imagem_principal','whatsapp','email'
        ]);
    }
}
