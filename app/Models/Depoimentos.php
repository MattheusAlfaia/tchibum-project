<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depoimentos extends Model
{
    protected $table = 'depoimentos';
    protected $fillable = ['nome','avaliação','depoimento','foto','ocupação'];
}
