<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Forms\Components\DatePicker;
use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    use BaseDashboard\Concerns\HasFiltersForm;

    public function filtersForm(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('packageType')
                    ->options([
                        'all' => 'Todos os Pacotes',
                        'closed' => 'Pacote Fechado',
                        'custom' => 'Pacote Personalizado',
                    ])
                    ->default('all')
                    ->label('Tipo de Pacote')
                    ->columnSpan(1),

                DatePicker::make('startDate')
                    ->label('Data de Início')
                    ->maxDate(fn ($get) => $get('endDate') ?: now())
                    ->columnSpan(1),

                DatePicker::make('endDate')
                    ->label('Data de Término')
                    ->minDate(fn ($get) => $get('startDate') ?: now())
                    ->maxDate(now())
                    ->columnSpan(1),
            ])
            ->columns(3);
    }

}
