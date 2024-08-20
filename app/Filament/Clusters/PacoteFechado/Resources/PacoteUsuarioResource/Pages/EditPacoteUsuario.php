<?php

namespace App\Filament\Clusters\PacoteFechado\Resources\PacoteUsuarioResource\Pages;

use App\Filament\Clusters\PacoteFechado\Resources\PacoteUsuarioResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPacoteUsuario extends EditRecord
{
    protected static string $resource = PacoteUsuarioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
