<?php

namespace App\Filament\Clusters\CustomPacote\Resources\PacotePersoOpcoeResource\Pages;

use App\Filament\Clusters\CustomPacote\Resources\PacotePersoOpcoeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPacotePersoOpcoe extends EditRecord
{
    protected static string $resource = PacotePersoOpcoeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
