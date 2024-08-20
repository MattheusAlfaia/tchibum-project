<?php

namespace App\Filament\Clusters\PacoteFechado\Resources\PacoteOpcoeResource\Pages;

use App\Filament\Clusters\PacoteFechado\Resources\PacoteOpcoeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePacoteOpcoe extends CreateRecord
{
    protected static string $resource = PacoteOpcoeResource::class;

    protected static ?string $navigationLabel = 'Atividades Inclusas';
}
