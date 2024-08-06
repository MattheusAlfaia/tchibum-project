<?php

namespace App\Filament\Resources\OpcoeResource\Pages;

use App\Filament\Resources\OpcoeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOpcoes extends ListRecords
{
    protected static string $resource = OpcoeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
