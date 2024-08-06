<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContatoResource\Pages;
use App\Filament\Resources\ContatoResource\RelationManagers;
use App\Models\Contato;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContatoResource extends Resource
{
    protected static ?string $model = Contato::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Contato';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('imagem_principal')
                    ->required(),
                Forms\Components\TextInput::make('whatsapp')
                    ->required()
                    ->maxLength(14),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(50),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('whatsapp')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
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
            'index' => Pages\ListContatos::route('/'),
            'create' => Pages\CreateContato::route('/create'),
            'edit' => Pages\EditContato::route('/{record}/edit'),
        ];
    }
}
