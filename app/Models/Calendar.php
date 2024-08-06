<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comunidade;

class Calendar extends Model
{
    protected $table = 'calendar';
    protected $fillable = ['title','comunidade_id','start_date','end_date','color'];

    public function comunidade()
    {
        return $this->belongsTo(Comunidade::class);
    }


}
