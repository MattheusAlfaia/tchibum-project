<?php

namespace App\Filament\Resources\PacoteOpcoeResource\Pages;

use App\Filament\Resources\PacoteOpcoeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPacoteOpcoe extends EditRecord
{
    protected static string $resource = PacoteOpcoeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
