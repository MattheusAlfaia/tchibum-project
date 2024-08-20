<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pacote;
use App\Models\Opcoe;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class PacoteOpcoe extends Model
{
    use HasFactory;
    use LogsActivity;
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
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly([
            'pacote_id', 'opcao_id'
        ]);
    }
}
