<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PacotePersonalizado;
use App\Models\Opcoe;

class PacotePersoOpcoe extends Model
{
    protected $table = 'pacotepersoopcoe';
    protected $fillable = ['pacoteperso_id', 'opcaoperso_id'];

    public function pacoteperso()
    {
        return $this->belongsTo(PacotePersonalizado::class);
    }

    public function opcaoperso()
    {
        return $this->belongsTo(Opcoe::class);
    }
}
