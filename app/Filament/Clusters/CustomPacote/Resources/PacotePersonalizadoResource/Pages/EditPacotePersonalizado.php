<?php

namespace App\Filament\Clusters\CustomPacote\Resources\PacotePersonalizadoResource\Pages;

use App\Filament\Clusters\CustomPacote\Resources\PacotePersonalizadoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPacotePersonalizado extends EditRecord
{
    protected static string $resource = PacotePersonalizadoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
