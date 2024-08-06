<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;




class Users extends BaseWidget
{

    protected function getStats(): array
    {

    $users = User::all();
        // Obtenha os valores associados às chaves especificadas
    $onlineUsers = ['users'=>[]];



    foreach($users as $user){


      array_push($onlineUsers['users'] ,Cache::many(['user-online-'. $user->id]));

    }


    // Filtrar os usuários online
        $filteredOnlineUsers = array_filter($onlineUsers['users'], function ($user) {
            // Verifica se o valor é true (usuário online)
            return reset($user) === true;
        });



    // Contar os usuários online
    $countOnlineUsers = count($filteredOnlineUsers);


        return [
          Stat::make('Total de Usuários',$users->where('role','user')->count()),
          Stat::make('Usuários Online',$countOnlineUsers)

        ];
    }
}
