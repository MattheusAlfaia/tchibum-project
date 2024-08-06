<?php

namespace App\Filament\Resources\PacoteOpcoeResource\Pages;

use App\Filament\Resources\PacoteOpcoeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPacoteOpcoes extends ListRecords
{
    protected static string $resource = PacoteOpcoeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
