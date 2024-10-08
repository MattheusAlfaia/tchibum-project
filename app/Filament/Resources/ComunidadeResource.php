<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ComunidadeResource\Pages;
use App\Filament\Resources\ComunidadeResource\RelationManagers;
use App\Models\Comunidade;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ComunidadeResource extends Resource
{
    protected static ?string $model = Comunidade::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';

    protected static ?string $navigationGroup = 'Comunidades e Atividades';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nome')
                    ->required()
                    ->maxLength(35),
                Forms\Components\TextInput::make('titulo')
                    ->required()
                    ->maxLength(80),
                Forms\Components\MarkdownEditor::make('descricao')
                    ->required()
                    ->maxLength(1200),
                Forms\Components\TextInput::make('latitude')
                    ->maxLength(255),
                Forms\Components\TextInput::make('longitude')
                    ->maxLength(255),
                Forms\Components\TextInput::make('endereço')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('mensagem')
                    ->required()
                    ->label('Saída do Barco')
                    ->maxLength(255),
                Forms\Components\TextInput::make('taxa')
                    ->required()
                    ->label('Taxa de transporte')
                    ->numeric(10.2),
                Forms\Components\FileUpload::make('imagem_principal')
                    ->maxSize(50000)
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        null,
                        '16:9',
                        '4:3',
                        '1:1',
                    ])
                    ->optimize('webp')
                    ->directory('comunidades')
                    ->disk('public')
                    ->required(),
                Forms\Components\FileUpload::make('imagens_secundarias')
                    ->maxSize(50000)
                    ->directory('comunidades')
                    ->disk('public')
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        null,
                        '16:9',
                        '4:3',
                        '1:1',
                    ])
                    ->optimize('webp')
                    ->multiple()
                    ->required(),
                Forms\Components\FileUpload::make('video')
                    ->maxSize(100000)
                    ->directory('comunidades')
                    ->disk('public'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome')
                    ->searchable(),
                Tables\Columns\TextColumn::make('titulo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('endereço')
                    ->searchable(),
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
            'index' => Pages\ListComunidades::route('/'),
            //'create' => Pages\CreateComunidade::route('/create'),
            //'edit' => Pages\EditComunidade::route('/{record}/edit'),
        ];
    }
}
