<?php

namespace App\Filament\Resources\SobreResource\Pages;

use App\Filament\Resources\SobreResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSobres extends ListRecords
{
    protected static string $resource = SobreResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
