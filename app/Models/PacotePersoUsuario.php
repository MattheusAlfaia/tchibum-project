<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PacotePersonalizado;
use App\Models\User;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class PacotePersoUsuario extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $table = 'pacotepersousuarios';
    protected $fillable = ['pacoteperso_id', 'user_id','data','status'];


    public function pacoteperso()
    {
        return $this->belongsTo(PacotePersonalizado::class, 'pacoteperso_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly([
            'pacoteperso_id', 'user_id','data','status'
        ]);
    }
}
