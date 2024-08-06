<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PacoteOpcoeResource\Pages;
use App\Filament\Resources\PacoteOpcoeResource\RelationManagers;
use App\Models\PacoteOpcoe;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Pacote;
use App\Models\Opcoe;

class PacoteOpcoeResource extends Resource
{
    protected static ?string $model = PacoteOpcoe::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Pacotes Fechados';

    protected static ?string $navigationLabel = 'Atividades Inclusas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('pacote_id')
                ->label('Pacote')
                ->options(Pacote::all()->pluck('nome', 'id'))
                ->searchable()
                ->required(),

                Forms\Components\Select::make('opcao_id')
                ->label('Atividade')
                ->options(Opcoe::all()->pluck('nome', 'id'))
                ->searchable()
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('pacote.nome')
                    ->label('Pacotes')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('opcao.nome')
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
            'index' => Pages\ListPacoteOpcoes::route('/'),
            'create' => Pages\CreatePacoteOpcoe::route('/create'),
            'edit' => Pages\EditPacoteOpcoe::route('/{record}/edit'),
        ];
    }
}
