<?php

namespace App\Filament\Resources\PacoteUsuarioResource\Pages;

use App\Filament\Resources\PacoteUsuarioResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPacoteUsuarios extends ListRecords
{
    protected static string $resource = PacoteUsuarioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
