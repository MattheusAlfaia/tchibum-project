<?php

namespace App\Filament\Clusters\CMS\Resources\MensagemResource\Pages;

use App\Filament\Clusters\CMS\Resources\MensagemResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMensagems extends ListRecords
{
    protected static string $resource = MensagemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
