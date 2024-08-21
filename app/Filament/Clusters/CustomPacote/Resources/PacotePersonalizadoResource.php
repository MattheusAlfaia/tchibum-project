<?php

namespace App\Filament\Clusters\CustomPacote\Resources;

use App\Filament\Clusters\CustomPacote;
use App\Filament\Clusters\CustomPacote\Resources\PacotePersonalizadoResource\Pages;
use App\Filament\Clusters\CustomPacote\Resources\PacotePersonalizadoResource\RelationManagers;
use App\Models\PacotePersonalizado;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use App\Models\Comunidade;
use App\Models\User;


class PacotePersonalizadoResource extends Resource
{
    protected static ?string $model = PacotePersonalizado::class;

    protected static ?string $navigationIcon = 'heroicon-o-lock-open';

    protected static ?string $cluster = CustomPacote::class;

    protected static \Filament\Pages\SubNavigationPosition $subNavigationPosition = \Filament\Pages\SubNavigationPosition::Top;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('comunidade_id')
                    ->label('Comunidade')
                    ->options(Comunidade::all()->pluck('nome', 'id'))
                    ->required(),
                Forms\Components\Select::make('user_id')
                    ->label('Usuário')
                    ->options(user::all()->pluck('name', 'id'))
                    ->required(),
                Forms\Components\TextInput::make('preco')
                    ->required()
                    ->numeric(),
                Forms\Components\DatePicker::make('data')
                    //->date('d/m/Y')
                    ->required(),
                Forms\Components\DatePicker::make('data_final')
                    //->date('d-m-Y')
                    ->required(),
                Forms\Components\TextInput::make('pessoas')
                    ->required()
                    ->numeric(),
                // Forms\Components\TextInput::make('dias')
                //     ->required()
                //     ->numeric(),
                Forms\Components\Select::make('status')
                    ->required()
                    ->options([
                        'EM ANALISE' => 'EM ANALISE',
                        'APROVADO'=> 'APROVADO',
                        'RECUSADO'=>'RECUSADO'
                        ])
                    ->default('EM ANALISE'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('comunidade.nome')
                    ->label('Comunidade')
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Solicitante')
                    ->sortable(),
                Tables\Columns\TextColumn::make('preco')
                    ->label('Preço')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('data')
                    ->date('d/M/Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('data_final')
                    ->date('d/M/Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
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
            'index' => Pages\ListPacotePersonalizados::route('/'),
            'create' => Pages\CreatePacotePersonalizado::route('/create'),
            'edit' => Pages\EditPacotePersonalizado::route('/{record}/edit'),
        ];
    }
}
