<?php

namespace App\Filament\Clusters\CMS\Resources;

use App\Filament\Clusters\CMS;
use App\Filament\Clusters\CMS\Resources\DepoimentosResource\Pages;
use App\Filament\Clusters\CMS\Resources\DepoimentosResource\RelationManagers;
use App\Models\Depoimentos;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use IbrahimBougaoua\FilamentRatingStar\Actions\RatingStar;
use IbrahimBougaoua\FilamentRatingStar\Columns\RatingStarColumn;

class DepoimentosResource extends Resource
{
    protected static ?string $model = Depoimentos::class;
    protected static ?string $navigationIcon = 'heroicon-o-star';

    protected static ?string $cluster = CMS::class;

    protected static \Filament\Pages\SubNavigationPosition $subNavigationPosition = \Filament\Pages\SubNavigationPosition::Top;

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nome')
                    ->required()
                    ->maxLength(15),
                RatingStar::make('avaliação')
                    ->default(0)
                    ->required(),
                Forms\Components\MarkdownEditor::make('depoimento')
                    ->required()
                    ->maxLength(165),
                Forms\Components\FileUpload::make('foto')
                    ->directory('depoimento')
                    ->disk('public')
                    ->optimize('webp')
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
                Tables\Columns\ImageColumn::make('foto')
                    ->label('Foto')
                    ->circular(),
                Tables\Columns\TextColumn::make('nome')
                    ->searchable(),
                RatingStarColumn::make('avaliação')
                    ->size('sm'),
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
            //'create' => Pages\CreateDepoimentos::route('/create'),
            //'edit' => Pages\EditDepoimentos::route('/{record}/edit'),
        ];
    }
}
