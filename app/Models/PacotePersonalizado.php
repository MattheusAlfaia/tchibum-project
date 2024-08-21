<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comunidade;
use App\Models\Opcoe;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use App\Models\User;


class PacotePersonalizado extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $table = 'pacotes_personalizados';
    protected $fillable = ['comunidade_id','user_id','preco','data', 'data_final','pessoas','dias','status'];


    public function comunidade()
    {
        return $this->belongsTo(Comunidade::class);
    }

    public function opcoes()
    {
        return $this->belongsToMany(Opcoe::class, 'pacotepersoopcoe', 'pacoteperso_id', 'opcaoperso_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly([
            'comunidade_id','user_id','preco','data', 'data_final','pessoas','dias','status'
        ]);
    }

}
