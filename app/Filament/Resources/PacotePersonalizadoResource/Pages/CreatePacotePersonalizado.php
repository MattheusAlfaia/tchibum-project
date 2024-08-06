<?php

namespace App\Filament\Resources\PacotePersonalizadoResource\Pages;

use App\Filament\Resources\PacotePersonalizadoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Models\PacotePersonalizado;
use App\Models\User;
use App\Models\Comunidade;
use Illuminate\Support\Facades\Mail;
use App\Mail\PacotePersonalizados;
use App\Models\PacotePersoOpcoe;

class CreatePacotePersonalizado extends CreateRecord
{
    protected static string $resource = PacotePersonalizadoResource::class;

}
