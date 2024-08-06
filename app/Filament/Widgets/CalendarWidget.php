<?php
// app/Filament/Widgets/CalendarWidget.php
namespace App\Filament\Widgets;

use App\Models\Calendar;
use Filament\Forms;
use Illuminate\Database\Eloquent\Model;
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;
use App\Models\Comunidade;

class CalendarWidget extends FullCalendarWidget
{
    public Model | string | null $model = Calendar::class;

    public function fetchEvents(array $fetchInfo): array
    {
        return Calendar::where('start_date', '>=', $fetchInfo['start'])
            ->where('end_date', '<=', $fetchInfo['end'])
            ->get()
            ->map(function (Calendar $task) {
                return [
                    'id'    => $task->id,
                    'title'    => $task->title,
                    'comunidade_id' => $task->comunidade_id,
                    'start' => $task->start_date,
                    'end'   => $task->end_date,
                    'color' => $task->color,
                ];
            })
            ->toArray();
    }

    public function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('title')
                ->label('Título')
                ->rules('required'),
            Forms\Components\Select::make('comunidade_id')
                ->label('Comunidade')
                ->options(Comunidade::all()->pluck('nome', 'id'))
                ->rules('required'),
            Forms\Components\Grid::make()
                ->schema([
                    Forms\Components\DateTimePicker::make('start_date')
                    ->label('Data de Início')
                    ->rules('required'),
                    Forms\Components\DateTimePicker::make('end_date')
                    ->label('Data de Término')
                    ->rules('required'),
                ]),
            Forms\Components\ColorPicker::make('color')
                ->label('Cor')
                ->rules('required'),
        ];
    }

    public static function canView(): bool
    {
        return false;
    }
}
