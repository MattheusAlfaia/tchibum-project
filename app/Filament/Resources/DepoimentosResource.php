<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DepoimentosResource\Pages;
use App\Filament\Resources\DepoimentosResource\RelationManagers;
use App\Models\Depoimentos;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DepoimentosResource extends Resource
{
    protected static ?string $model = Depoimentos::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nome')
                ->required()
                ->maxLength(15),
                Forms\Components\TextInput::make('avaliação')
                ->default(0)
                ->required()
                ->numeric(),
                Forms\Components\MarkdownEditor::make('depoimento')
                ->required()
                ->maxLength(165),
                Forms\Components\FileUpload::make('foto')
                ->required(),
                Forms\Components\TextInput::make('ocupação')
                ->required()
                ->maxLength(25),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome')
                ->searchable(),
                Tables\Columns\TextColumn::make('avaliação')
                ->searchable(),
                Tables\Columns\TextColumn::make('ocupação')
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
            'index' => Pages\ListDepoimentos::route('/'),
            'create' => Pages\CreateDepoimentos::route('/create'),
            'edit' => Pages\EditDepoimentos::route('/{record}/edit'),
        ];
    }
}
