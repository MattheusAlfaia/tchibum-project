<?php

namespace App\Filament\Resources\PacoteUsuarioResource\Pages;

use App\Filament\Resources\PacoteUsuarioResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Models\Pacote;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\PacoteUsuarios;
use App\Mail\Contato;

class CreatePacoteUsuario extends CreateRecord
{
    protected static string $resource = PacoteUsuarioResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array{

        $pacote = Pacote::with('comunidade','opcoes')->find($data['pacote_id']);
        $user = User::find($data['user_id']);

        $email_tchibum = 'tchibumnaamazonia@gmail.com';

        $mail = Mail::to([$user->email,$email_tchibum])->send(new PacoteUsuarios([
            'pacote'=> $pacote,
            'user'=> $user,
        ]));

        dd($mail);
    }
}
