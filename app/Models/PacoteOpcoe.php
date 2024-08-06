<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pacote;
use App\Models\Opcoe;

class PacoteOpcoe extends Model
{
    protected $table = 'pacoteopcoe';
    protected $fillable = ['pacote_id', 'opcao_id'];

    public function pacote()
    {
        return $this->belongsTo(Pacote::class);
    }

    public function opcao()
    {
        return $this->belongsTo(Opcoe::class);
    }

}
