<?php

namespace App\Filament\Clusters\CMS\Resources\ContatoResource\Pages;

use App\Filament\Clusters\CMS\Resources\ContatoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListContatos extends ListRecords
{
    protected static string $resource = ContatoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
