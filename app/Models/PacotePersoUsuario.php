<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PacotePersonalizado;
use App\Models\User;

class PacotePersoUsuario extends Model
{

    protected $table = 'pacotepersousuarios';
    protected $fillable = ['pacoteperso_id', 'user_id','data','status'];


    public function pacoteperso()
    {
        return $this->belongsTo(PacotePersonalizado::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
