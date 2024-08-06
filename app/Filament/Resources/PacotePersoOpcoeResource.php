<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PacotePersoOpcoeResource\Pages;
use App\Filament\Resources\PacotePersoOpcoeResource\RelationManagers;
use App\Models\PacotePersoOpcoe;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use App\Models\Comunidade;
use App\Models\Opcoe;

class PacotePersoOpcoeResource extends Resource
{
    protected static ?string $model = PacotePersoOpcoe::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Pacotes Personalizados';

    protected static ?string $navigationLabel = 'Atividades Inclusas';

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
            'create' => Pages\CreatePacotePersoOpcoe::route('/create'),
            'edit' => Pages\EditPacotePersoOpcoe::route('/{record}/edit'),
        ];
    }
}
