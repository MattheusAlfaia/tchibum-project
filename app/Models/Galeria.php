<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Galeria extends Model
{
    use HasFactory;
    use LogsActivity;
    protected $table = 'galeria';
    protected $fillable = [
        'imagem',
    ];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly([
            'imagem',
        ]);
    }
}
