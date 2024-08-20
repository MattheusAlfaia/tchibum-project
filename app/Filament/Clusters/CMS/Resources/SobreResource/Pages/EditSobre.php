<?php

namespace App\Filament\Clusters\CMS\Resources\SobreResource\Pages;

use App\Filament\Clusters\CMS\Resources\SobreResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSobre extends EditRecord
{
    protected static string $resource = SobreResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
