<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MensagemResource\Pages;
use App\Filament\Resources\MensagemResource\RelationManagers;
use App\Models\Mensagem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MensagemResource extends Resource
{
    protected static ?string $model = Mensagem::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Mensagens';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nome_cliente')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('email_cliente')
                    ->email()
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('assunto_cliente')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('mensagem_cliente')
                    ->required()
                    ->maxLength(700),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome_cliente')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email_cliente')
                    ->searchable(),
                Tables\Columns\TextColumn::make('assunto_cliente')
                    ->searchable(),
                Tables\Columns\TextColumn::make('mensagem_cliente')
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
            'index' => Pages\ListMensagems::route('/'),
            'create' => Pages\CreateMensagem::route('/create'),
            'edit' => Pages\EditMensagem::route('/{record}/edit'),
        ];
    }
}
