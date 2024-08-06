<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PacoteResource\Pages;
use App\Filament\Resources\PacoteResource\RelationManagers;
use App\Models\Pacote;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use App\Models\Comunidade;
use Filament\Forms\Components\MarkdownEditor;

class PacoteResource extends Resource
{
    protected static ?string $model = Pacote::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Pacotes Fechados';



    public static function form(Form $form): Form
    {

        return $form
            ->schema([
                Forms\Components\TextInput::make('nome')
                    ->required()
                    ->maxLength(35),
                Forms\Components\TextInput::make('titulo')
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make('descricao')
                    ->required()
                    ->maxLength(300),
                Forms\Components\Select::make('comunidade_id')
                    ->label('Comunidade')
                    ->options(Comunidade::all()->pluck('nome', 'id'))
                    ->searchable()
                    ->required(),
                Forms\Components\FileUpload::make('imagem_principal')
                    ->label('Imagem Principal')
                    ->maxSize(50000)
                    ->required(),
                Forms\Components\FileUpload::make('imagens_secundarias')
                    ->label('Imagens Secundarias')
                    ->multiple()
                    ->required(),
                Forms\Components\TextInput::make('preco')
                    ->required()
                    ->numeric(10,2)
                    ->extraAttributes(['data-inputmask' => "'alias': 'currency', 'prefix': '', 'rightAlign': false, 'digits': 2, 'digitsOptional': false, 'radixPoint': ',', 'groupSeparator': '.', 'autoGroup': true"]),
                Forms\Components\DatePicker::make('data')
                    ->date()
                    ->required(),
                Forms\Components\DatePicker::make('data_final')
                    ->date()
                    ->required(),
                MarkdownEditor::make('infos')
                    ->label('Informações')
                    ->toolbarButtons([
                        'attachFiles',
                        'blockquote',
                        'bold',
                        'bulletList',
                        'codeBlock',
                        'h2',
                        'h3',
                        'italic',
                        'link',
                        'orderedList',
                        'redo',
                        'strike',
                        'underline',
                        'undo',
                    ])
                    ->required()
                    ->maxLength(1000),
                Forms\Components\FileUpload::make('video')
                    ->maxSize(50000)
                    ->required(),
                Forms\Components\TextInput::make('pessoas')
                    // ->required()
                    ->numeric(),
         
            ]);


    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome')
                    ->searchable(),
                Tables\Columns\TextColumn::make('preco')
                    ->numeric()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('data')
                    ->date('d/M/Y H:i:s')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('comunidade.nome')
                    ->sortable()
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
            'index' => Pages\ListPacotes::route('/'),
            'create' => Pages\CreatePacote::route('/create'),
            'edit' => Pages\EditPacote::route('/{record}/edit'),
        ];
    }
}
