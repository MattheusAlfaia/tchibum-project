<?php

namespace App\Filament\Resources\ComunidadeResource\Pages;

use App\Filament\Resources\ComunidadeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListComunidades extends ListRecords
{
    protected static string $resource = ComunidadeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
