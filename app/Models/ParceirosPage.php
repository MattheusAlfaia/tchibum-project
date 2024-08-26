<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class ParceirosPage extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $table = 'parceiros_page';

    protected $fillable = [
        'imagem_principal',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly([
            'imagem_principal',
        ]);
    }
}
