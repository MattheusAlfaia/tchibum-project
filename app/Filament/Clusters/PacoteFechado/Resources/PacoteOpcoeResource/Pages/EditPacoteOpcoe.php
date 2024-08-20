<?php

namespace App\Filament\Clusters\PacoteFechado\Resources\PacoteOpcoeResource\Pages;

use App\Filament\Clusters\PacoteFechado\Resources\PacoteOpcoeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPacoteOpcoe extends EditRecord
{
    protected static string $resource = PacoteOpcoeResource::class;

    protected static ?string $navigationLabel = 'Atividades Inclusas';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
