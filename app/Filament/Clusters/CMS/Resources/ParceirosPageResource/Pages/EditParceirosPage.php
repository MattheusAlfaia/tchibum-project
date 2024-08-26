<?php

namespace App\Filament\Clusters\CMS\Resources\ParceirosPageResource\Pages;

use App\Filament\Clusters\CMS\Resources\ParceirosPageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditParceirosPage extends EditRecord
{
    protected static string $resource = ParceirosPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
