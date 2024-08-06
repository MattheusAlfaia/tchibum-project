<?php

namespace App\Filament\Resources\OpcoeResource\Pages;

use App\Filament\Resources\OpcoeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOpcoe extends EditRecord
{
    protected static string $resource = OpcoeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
