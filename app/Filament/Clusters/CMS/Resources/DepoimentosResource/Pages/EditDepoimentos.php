<?php

namespace App\Filament\Clusters\CMS\Resources\DepoimentosResource\Pages;

use App\Filament\Clusters\CMS\Resources\DepoimentosResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDepoimentos extends EditRecord
{
    protected static string $resource = DepoimentosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
