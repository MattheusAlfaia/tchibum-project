<?php

namespace App\Filament\Resources\PacotePersoUsuarioResource\Pages;

use App\Filament\Resources\PacotePersoUsuarioResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Models\PacotePersonalizado;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\PacotePersoUsuarios;

class CreatePacotePersoUsuario extends CreateRecord
{
    protected static string $resource = PacotePersoUsuarioResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array{

        $pacote = PacotePersonalizado::with('comunidade','opcoes')->find($data['pacoteperso_id']);
        $user = User::find($data['user_id']);

        $email_tchibum = 'tchibumnaamazonia@gmail.com';

        $mail = Mail::to([$user->email,$email_tchibum])->send(new PacotePersoUsuarios([
            'pacote'=> $pacote,
            'user'=> $user,
        ]));

        return $data;
    }
}
