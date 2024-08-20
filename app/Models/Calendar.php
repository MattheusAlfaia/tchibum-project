<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comunidade;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Calendar extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $table = 'calendar';
    protected $fillable = ['title','comunidade_id','start_date','end_date','color'];

    public function comunidade()
    {
        return $this->belongsTo(Comunidade::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly([
            'title','comunidade_id','start_date','end_date','color'
        ]);
    }
}
