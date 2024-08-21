<?php

namespace App\Filament\Clusters\PacoteFechado\Resources\PacoteResource\Pages;

use App\Filament\Clusters\PacoteFechado\Resources\PacoteResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPacotes extends ListRecords
{
    protected static string $resource = PacoteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
