<?php

namespace App\Filament\Clusters\CMS\Resources;

use App\Filament\Clusters\CMS;
use App\Filament\Clusters\CMS\Resources\MensagemResource\Pages;
use App\Filament\Clusters\CMS\Resources\MensagemResource\RelationManagers;
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

    protected static ?string $cluster = CMS::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-bottom-center-text';

    protected static ?string $navigationLabel = 'Mensagens';

    protected static \Filament\Pages\SubNavigationPosition $subNavigationPosition = \Filament\Pages\SubNavigationPosition::Top;

    protected static ?int $navigationSort = 4;



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
