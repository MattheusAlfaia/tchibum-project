<?php

namespace App\Filament\Clusters\CMS\Resources;

use App\Filament\Clusters\CMS;
use App\Filament\Clusters\CMS\Resources\HomeResource\Pages;
use App\Filament\Clusters\CMS\Resources\HomeResource\RelationManagers;
use App\Models\Home;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HomeResource extends Resource
{
    protected static ?string $model = Home::class;

    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static ?string $cluster = CMS::class;

    protected static ?string $navigationLabel = 'Home';

    protected static \Filament\Pages\SubNavigationPosition $subNavigationPosition = \Filament\Pages\SubNavigationPosition::Top;

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('titulo_principal')
                    ->required()
                    ->maxLength(40),
                Forms\Components\FileUpload::make('video_principal')
                    ->maxSize(150000)
                    ->directory('home')
                    ->disk('public')
                    ->required(),
                Forms\Components\TextInput::make('titulo_bem_vindo')
                    ->required()
                    ->maxLength(20),
                Forms\Components\MarkdownEditor::make('descricao_bem_vindo')
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
                    ->optimize('webp')
                    ->directory('home')
                    ->disk('public')
                    ->required(),
                Forms\Components\TextInput::make('nome_atividade_comunidade3')
                    ->required()
                    ->label('Nome Atividade/Comunidade 3')
                    ->maxLength(25),
                Forms\Components\FileUpload::make('imagem_atividade_comunidade2')
                    ->label('Imagem Atividade/Comunidade 2')
                    ->optimize('webp')
                    ->directory('home')
                    ->disk('public')
                    ->required(),
                Forms\Components\Textarea::make('descricao_atividade_comunidade3')
                    ->required()
                    ->label('Descrição Atividade/Comunidade 3')
                    ->maxLength(125),
                Forms\Components\FileUpload::make('imagem_atividade_comunidade3')
                    ->label('Imagem Atividade/Comunidade 3')
                    ->optimize('webp')
                    ->directory('home')
                    ->disk('public')
                    ->required(),
                Forms\Components\TextInput::make('nome_atividade_comunidade4')
                    ->required()
                    ->label('Nome Atividade/Comunidade 4')
                    ->maxLength(25),
                Forms\Components\FileUpload::make('imagem_atividade_comunidade4')
                    ->label('Imagem Atividade/Comunidade 4')
                    ->optimize('webp')
                    ->directory('home')
                    ->disk('public')
                    ->required(),
                Forms\Components\Textarea::make('descricao_atividade_comunidade4')
                    ->required()
                    ->label('Descrição Atividade/Comunidade 4')
                    ->maxLength(125),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('titulo_principal')
                    ->searchable(),
                Tables\Columns\TextColumn::make('video_principal')
                    ->searchable(),
                Tables\Columns\TextColumn::make('titulo_bem_vindo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('descricao_bem_vindo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nome_atividade_comunidade1')
                    ->searchable(),
                Tables\Columns\TextColumn::make('descricao_atividade_comunidade1')
                    ->searchable(),
                Tables\Columns\TextColumn::make('imagem_atividade_comunidade1')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nome_atividade_comunidade2')
                    ->searchable(),
                Tables\Columns\TextColumn::make('descricao_atividade_comunidade2')
                    ->searchable(),
                Tables\Columns\TextColumn::make('imagem_atividade_comunidade2')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nome_atividade_comunidade3')
                    ->searchable(),
                Tables\Columns\TextColumn::make('descricao_atividade_comunidade3')
                    ->searchable(),
                Tables\Columns\TextColumn::make('imagem_atividade_comunidade3')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nome_atividade_comunidade4')
                    ->searchable(),
                Tables\Columns\TextColumn::make('descricao_atividade_comunidade4')
                    ->searchable(),
                Tables\Columns\TextColumn::make('imagem_atividade_comunidade4')
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
            'index' => Pages\ListHomes::route('/'),
            'create' => Pages\CreateHome::route('/create'),
            'edit' => Pages\EditHome::route('/{record}/edit'),
        ];
    }
}
