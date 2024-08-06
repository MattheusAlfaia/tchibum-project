<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PacoteUsuarioResource\Pages;
use App\Filament\Resources\PacoteUsuarioResource\RelationManagers;
use App\Models\PacoteUsuario;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Pacote;
use App\Models\User;

class PacoteUsuarioResource extends Resource
{
    protected static ?string $model = PacoteUsuario::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Pacotes Fechados';

    protected static ?string $navigationLabel = 'Compras';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('pacote_id')
                    ->label('Pacote')
                    ->options(Pacote::all()->pluck('nome', 'id'))
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('user_id')
                    ->label('Usuários')
                    ->options(User::all()->pluck('name', 'id'))
                    ->searchable()
                    ->required(),
                Forms\Components\DateTimePicker::make('data')
                    ->required(),
                Forms\Components\Select::make('status')
                    ->required()
                    ->options([ 'PENDENTE' => 'PENDENTE',
                            'NAO_PAGO'=>'NÃO PAGO',
                            'PAGO'=>'PAGO'])
                    ->default('PENDENTE'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('pacote.nome')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.email')
                   ->label('Cliente')
                   ->searchable()
                   ->sortable(),
                Tables\Columns\TextColumn::make('data')
                     ->date('d/m/Y H:i:s')
                     ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
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
            'index' => Pages\ListPacoteUsuarios::route('/'),
            'create' => Pages\CreatePacoteUsuario::route('/create'),
            'edit' => Pages\EditPacoteUsuario::route('/{record}/edit'),
        ];
    }
}
