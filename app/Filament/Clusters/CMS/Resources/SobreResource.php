<?php

namespace App\Filament\Clusters\CMS\Resources;

use App\Filament\Clusters\CMS;
use App\Filament\Clusters\CMS\Resources\SobreResource\Pages;
use App\Filament\Clusters\CMS\Resources\SobreResource\RelationManagers;
use App\Models\Sobre;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SobreResource extends Resource
{
    protected static ?string $model = Sobre::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $cluster = CMS::class;
    protected static ?string $navigationLabel = 'Sobre';

    protected static \Filament\Pages\SubNavigationPosition $subNavigationPosition = \Filament\Pages\SubNavigationPosition::Top;

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('titulo_principal')
                    ->required()
                    ->maxLength(40),
                Forms\Components\MarkdownEditor::make('sobre')
                    ->required()
                    ->maxLength(700),
                    Forms\Components\TextInput::make('nome_atividade_comunidade1')
                    ->required()
                    ->label('Nome Atividade/Comunidade 1')
                    ->maxLength(25),
                Forms\Components\Textarea::make('descricao_atividade_comunidade1')
                    ->required()
                    ->label('Descrição Atividade/Comunidade 1')
                    ->maxLength(125),
                Forms\Components\TextInput::make('nome_atividade_comunidade2')
                    ->required()
                    ->label('Nome Atividade/Comunidade 2')
                    ->maxLength(25),
                Forms\Components\Textarea::make('descricao_atividade_comunidade2')
                    ->required()
                    ->label('Descrição Atividade/Comunidade 2')
                    ->maxLength(125),
                Forms\Components\FileUpload::make('imagem_atividade_comunidade1')
                    ->label('Imagem Atividade/Comunidade 1')
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        null,
                        '16:9',
                        '4:3',
                        '1:1',
                    ])
                    ->directory('sobre')
                    ->optimize('webp')
                    ->disk('public')
                    ->required(),
                Forms\Components\TextInput::make('nome_atividade_comunidade3')
                    ->required()
                    ->label('Nome Atividade/Comunidade 3')
                    ->maxLength(25),
                Forms\Components\FileUpload::make('imagem_atividade_comunidade2')
                    ->label('Imagem Atividade/Comunidade 2')
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        null,
                        '16:9',
                        '4:3',
                        '1:1',
                    ])
                    ->directory('sobre')
                    ->optimize('webp')
                    ->disk('public')
                    ->required(),
                Forms\Components\Textarea::make('descricao_atividade_comunidade3')
                    ->required()
                    ->label('Descrição Atividade/Comunidade 3')
                    ->maxLength(125),
                Forms\Components\FileUpload::make('imagem_atividade_comunidade3')
                    ->label('Imagem Atividade/Comunidade 3')
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        null,
                        '16:9',
                        '4:3',
                        '1:1',
                    ])
                    ->optimize('webp')
                    ->directory('sobre')
                    ->disk('public')
                    ->required(),
                Forms\Components\TextInput::make('nome_atividade_comunidade4')
                    ->required()
                    ->label('Nome Atividade/Comunidade 4')
                    ->maxLength(25),
                Forms\Components\FileUpload::make('imagem_atividade_comunidade4')
                    ->label('Imagem Atividade/Comunidade 4')
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        null,
                        '16:9',
                        '4:3',
                        '1:1',
                    ])
                    ->directory('sobre')
                    ->optimize('webp')
                    ->disk('public')
                    ->required(),
                Forms\Components\Textarea::make('descricao_atividade_comunidade4')
                    ->required()
                    ->label('Descrição Atividade/Comunidade 4')
                    ->maxLength(125),
                Forms\Components\FileUpload::make('capa_video_principal')
                    ->required()
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        null,
                        '16:9',
                        '4:3',
                        '1:1',
                    ])
                    ->directory('sobre')
                    ->optimize('webp')
                    ->disk('public')
                    ->maxSize(100000),
                Forms\Components\FileUpload::make('video_principal')
                    ->required()
                    ->directory('sobre')
                    ->disk('public')
                    ->maxSize(100000),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('titulo_principal')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sobre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nome_atividade_comunidade1')
                    ->searchable(),
                Tables\Columns\TextColumn::make('descricao_atividade_comunidade1')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('imagem_atividade_comunidade1'),
                Tables\Columns\TextColumn::make('nome_atividade_comunidade2')
                    ->searchable(),
                Tables\Columns\TextColumn::make('descricao_atividade_comunidade2')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('imagem_atividade_comunidade2'),
                Tables\Columns\TextColumn::make('nome_atividade_comunidade3')
                    ->searchable(),
                Tables\Columns\TextColumn::make('descricao_atividade_comunidade3')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('imagem_atividade_comunidade3'),
                Tables\Columns\TextColumn::make('nome_atividade_comunidade4')
                    ->searchable(),
                Tables\Columns\TextColumn::make('descricao_atividade_comunidade4')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('imagem_atividade_comunidade4'),
                Tables\Columns\TextColumn::make('video_principal')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\ImageColumn::make('capa_video_principal'),
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
            'index' => Pages\ListSobres::route('/'),
            'create' => Pages\CreateSobre::route('/create'),
            'edit' => Pages\EditSobre::route('/{record}/edit'),
        ];
    }
}
