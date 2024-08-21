<?php

namespace App\Filament\Clusters\CMS\Resources\SobreResource\Pages;

use App\Filament\Clusters\CMS\Resources\SobreResource;
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
