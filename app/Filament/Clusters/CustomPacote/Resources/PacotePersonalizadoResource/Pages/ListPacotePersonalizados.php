<?php

namespace App\Filament\Clusters\CustomPacote\Resources\PacotePersonalizadoResource\Pages;

use App\Filament\Clusters\CustomPacote\Resources\PacotePersonalizadoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPacotePersonalizados extends ListRecords
{
    protected static string $resource = PacotePersonalizadoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
