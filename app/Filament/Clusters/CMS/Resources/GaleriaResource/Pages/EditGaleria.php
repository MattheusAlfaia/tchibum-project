<?php

namespace App\Filament\Clusters\CMS\Resources\GaleriaResource\Pages;

use App\Filament\Clusters\CMS\Resources\GaleriaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGaleria extends EditRecord
{
    protected static string $resource = GaleriaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
