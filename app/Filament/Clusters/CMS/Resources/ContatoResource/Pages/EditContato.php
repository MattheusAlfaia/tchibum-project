<?php

namespace App\Filament\Clusters\CMS\Resources\ContatoResource\Pages;

use App\Filament\Clusters\CMS\Resources\ContatoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditContato extends EditRecord
{
    protected static string $resource = ContatoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
