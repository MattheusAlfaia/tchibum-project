<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pacote;
use App\Models\User;

class PacoteUsuario extends Model
{
    protected $table = 'pacoteusuarios';
    protected $fillable = ['pacote_id', 'user_id','data','status'];


    public function pacote()
    {
        return $this->belongsTo(Pacote::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
