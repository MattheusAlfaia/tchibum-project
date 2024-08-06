<?php

namespace App\Filament\Resources\PacotePersoUsuarioResource\Pages;

use App\Filament\Resources\PacotePersoUsuarioResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPacotePersoUsuario extends EditRecord
{
    protected static string $resource = PacotePersoUsuarioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
