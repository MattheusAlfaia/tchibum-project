<?php

namespace App\Filament\Clusters\CMS\Resources;

use App\Filament\Clusters\CMS;
use App\Filament\Clusters\CMS\Resources\PostsResource\Pages;
use App\Filament\Clusters\CMS\Resources\PostsResource\RelationManagers;
use App\Models\Posts;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PostsResource extends Resource
{
    protected static ?string $model = Posts::class;


    protected static ?string $cluster = CMS::class;

    protected static ?string $navigationIcon = 'heroicon-o-pencil-square';

    protected static \Filament\Pages\SubNavigationPosition $subNavigationPosition = \Filament\Pages\SubNavigationPosition::Top;

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('titulo')
                    ->required()
                    ->maxLength(35),
                Forms\Components\TextInput::make('descricao')
                    ->maxLength(100),
                Forms\Components\MarkdownEditor::make('conteudo')
                    ->required()
                    ->maxLength(5000),
                Forms\Components\FileUpload::make('imagem_principal')
                    ->directory('post')
                    ->optimize('webp')
                    ->disk('public')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('titulo')
                    ->label('Título')
                    ->searchable(),
                Tables\Columns\TextColumn::make('descricao')
                    ->label('Descrição')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d/m/y H:m:s')
                    ->label('Criado em')
                    ->sortable(),
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
            'index' => Pages\ListPosts::route('/'),
            //'create' => Pages\CreatePosts::route('/create'),
            //'edit' => Pages\EditPosts::route('/{record}/edit'),
        ];
    }
}
