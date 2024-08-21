<?php

namespace App\Filament\Clusters\PacoteFechado\Resources\PacoteOpcoeResource\Pages;

use App\Filament\Clusters\PacoteFechado\Resources\PacoteOpcoeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPacoteOpcoes extends ListRecords
{
    protected static string $resource = PacoteOpcoeResource::class;

    protected static ?string $navigationLabel = 'Atividades Inclusas';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
