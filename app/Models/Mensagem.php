<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Mensagem extends Model
{
    use HasFactory;
    use LogsActivity;
    protected $table = 'mensagem';
    protected $fillable = ['nome_cliente','email_cliente','assunto_cliente','mensagem_cliente'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly([
            'nome_cliente','email_cliente','assunto_cliente','mensagem_cliente'
        ]);
    }
}
