<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cache;


class TrackOnlineUsers
{
    public function handle($request, Closure $next)
    {
        // Armazena a informação do usuário online usando o ID do usuário
        Cache::put('user-online-' . auth()->id(), true, now()->addMinutes(10));

        return $next($request);
    }
}
