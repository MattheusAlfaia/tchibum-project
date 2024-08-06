<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GaleriaResource\Pages;
use App\Filament\Resources\GaleriaResource\RelationManagers;
use App\Models\Galeria;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GaleriaResource extends Resource
{
    protected static ?string $model = Galeria::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Galeria';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('imagem')
                    ->maxSize(50000)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('imagem')
                ->label('Imagem'),
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
            'index' => Pages\ListGalerias::route('/'),
            'create' => Pages\CreateGaleria::route('/create'),
            'edit' => Pages\EditGaleria::route('/{record}/edit'),
        ];
    }
}
