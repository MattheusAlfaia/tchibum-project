<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Depoimentos extends Model
{
    use HasFactory;
    use LogsActivity;
    protected $table = 'depoimentos';
    protected $fillable = ['nome','avaliação','depoimento','foto','ocupação'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly([
            'nome','avaliação','depoimento','foto','ocupação'
        ]);
    }
}
