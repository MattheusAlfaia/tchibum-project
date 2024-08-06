<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Usuários';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                ->label('Nome')
                ->required(),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('role')
                    ->required()
                    ->options(User::all()->pluck('role','role'))
                    ->label('Permissão'),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->minLength(8),
                Forms\Components\FileUpload::make('profile_photo_path')
                    ->label('Foto de perfil'),
                Forms\Components\TextInput::make('cpf')
                    ->label('CPF'),
                Forms\Components\TextInput::make('uf')
                    ->label('UF')
                    ->maxLength(255),
                Forms\Components\TextInput::make('endereco')
                    ->label('Endereço')
                    ->maxLength(255),
                Forms\Components\TextInput::make('cep')
                    ->label('Cep')
                    ->maxLength(255),
                Forms\Components\TextInput::make('cidade')
                    ->label('Cep')
                    ->maxLength(255),
                Forms\Components\TextInput::make('identificacao')
                    ->label('Identificação')
                    ->maxLength(255),
                Forms\Components\TextInput::make('proficao')
                    ->label('Profissão')
                    ->maxLength(255),
                Forms\Components\TextInput::make('nacionalidade')
                    ->label('Nacionalidade')
                    ->maxLength(255),
                Forms\Components\TextInput::make('estado')
                    ->label('Estado')
                    ->maxLength(255),
    
                 
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->label('Nome Completo'),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('role')
                    ->searchable()
                    ->label('Permissão'),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
