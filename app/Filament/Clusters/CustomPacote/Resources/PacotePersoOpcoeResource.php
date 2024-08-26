<?php

namespace App\Filament\Clusters\CustomPacote\Resources;

use App\Filament\Clusters\CustomPacote;
use App\Filament\Clusters\CustomPacote\Resources\PacotePersoOpcoeResource\Pages;
use App\Filament\Clusters\CustomPacote\Resources\PacotePersoOpcoeResource\RelationManagers;
use App\Models\PacotePersoOpcoe;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Opcoe;

class PacotePersoOpcoeResource extends Resource
{
    protected static ?string $model = PacotePersoOpcoe::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder-open';

    protected static ?string $cluster = CustomPacote::class;

    protected static ?string $navigationLabel = 'Atividades Inclusas';
    protected static ?int $navigationSort = 3;

    protected static \Filament\Pages\SubNavigationPosition $subNavigationPosition = \Filament\Pages\SubNavigationPosition::Top;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('pacoteperso_id')
                ->label('Pacote Personlizado')
                ->numeric()
                ->required(),

                Forms\Components\Select::make('opcaoperso_id')
                ->label('Atividade')
                ->options(Opcoe::all()->pluck('nome', 'id'))
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            Tables\Columns\TextColumn::make('pacoteperso_id')
                ->label('Pacotes')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('opcaoperso.nome')
                ->label('Atividades')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
                ->label('Organizar por Criação')
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPacotePersoOpcoes::route('/'),
            //'create' => Pages\CreatePacotePersoOpcoe::route('/create'),
            //'edit' => Pages\EditPacotePersoOpcoe::route('/{record}/edit'),
        ];
    }
}
