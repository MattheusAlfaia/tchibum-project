<?php

namespace App\Filament\Resources\MensagemResource\Pages;

use App\Filament\Resources\MensagemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMensagem extends EditRecord
{
    protected static string $resource = MensagemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
