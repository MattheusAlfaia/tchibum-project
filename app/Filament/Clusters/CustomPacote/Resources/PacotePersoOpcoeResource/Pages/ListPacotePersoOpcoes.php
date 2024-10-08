<?php

namespace App\Filament\Clusters\CustomPacote\Resources\PacotePersoOpcoeResource\Pages;

use App\Filament\Clusters\CustomPacote\Resources\PacotePersoOpcoeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPacotePersoOpcoes extends ListRecords
{
    protected static string $resource = PacotePersoOpcoeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
