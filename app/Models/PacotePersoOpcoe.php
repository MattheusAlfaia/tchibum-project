<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PacotePersonalizado;
use App\Models\Opcoe;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class PacotePersoOpcoe extends Model
{
    use HasFactory;
    use LogsActivity;
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
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly([
            'pacoteperso_id', 'opcaoperso_id'
        ]);
    }
}
