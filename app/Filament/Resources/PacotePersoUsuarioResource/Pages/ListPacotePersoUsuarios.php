<?php

namespace App\Filament\Resources\PacotePersoUsuarioResource\Pages;

use App\Filament\Resources\PacotePersoUsuarioResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPacotePersoUsuarios extends ListRecords
{
    protected static string $resource = PacotePersoUsuarioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
