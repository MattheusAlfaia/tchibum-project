<?php

namespace App\Filament\Clusters\CMS\Resources;

use App\Filament\Clusters\CMS;
use App\Filament\Clusters\CMS\Resources\GaleriaResource\Pages;
use App\Filament\Clusters\CMS\Resources\GaleriaResource\RelationManagers;
use App\Models\Galeria;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class GaleriaResource extends Resource
{
    protected static ?string $model = Galeria::class;

    protected static ?string $navigationIcon = 'heroicon-o-squares-plus';

    protected static ?string $cluster = CMS::class;

    protected static \Filament\Pages\SubNavigationPosition $subNavigationPosition = \Filament\Pages\SubNavigationPosition::Top;

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('imagem')
                    ->optimize('webp')
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        null,
                        '16:9',
                        '4:3',
                        '1:1',
                    ])
                    ->directory('galeria')
                    ->disk('public')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('imagem'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
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
            'index' => Pages\ListGalerias::route('/'),
            //'create' => Pages\CreateGaleria::route('/create'),
            //'edit' => Pages\EditGaleria::route('/{record}/edit'),
        ];
    }
}
