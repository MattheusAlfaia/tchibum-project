<?php

namespace App\Filament\Clusters\CustomPacote\Resources;

use App\Filament\Clusters\CustomPacote;
use App\Filament\Clusters\CustomPacote\Resources\PacotePersoUsuarioResource\Pages;
use App\Filament\Clusters\CustomPacote\Resources\PacotePersoUsuarioResource\RelationManagers;
use App\Models\PacotePersoUsuario;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\PacotePersonalizado;
use App\Models\User;

class PacotePersoUsuarioResource extends Resource
{
    protected static ?string $model = PacotePersoUsuario::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    protected static ?string $cluster = CustomPacote::class;

    protected static \Filament\Pages\SubNavigationPosition $subNavigationPosition = \Filament\Pages\SubNavigationPosition::Top;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('pacoteperso_id')
                    ->label('Pacote')
                    ->options(PacotePersonalizado::all()->pluck('id', 'id'))
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
                        'NÃO PAGO'=>'NÃO PAGO',
                        'PAGO'=>'PAGO'])
                ->default('PENDENTE'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('pacoteperso_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Cliente')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('data')
                    ->date('d/m/Y H:i:s')
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
            'index' => Pages\ListPacotePersoUsuarios::route('/'),
            //'create' => Pages\CreatePacotePersoUsuario::route('/create'),
            //'edit' => Pages\EditPacotePersoUsuario::route('/{record}/edit'),
        ];
    }
}
