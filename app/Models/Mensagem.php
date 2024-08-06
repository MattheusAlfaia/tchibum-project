<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
    protected $table = 'mensagem';
    protected $fillable = ['nome_cliente','email_cliente','assunto_cliente','mensagem_cliente'];

}
