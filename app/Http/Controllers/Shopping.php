<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PacoteUsuario;
use App\Models\PacotePersoUsuario;
use App\Models\PacotePersonalizado;

class Shopping extends Controller
{
    public function index($user){
        
        $pacotesusuario = PacoteUsuario::with('pacote','user')->where('user_id',$user)->latest()->paginate(10);

        $pacotespersosusuario = PacotePersoUsuario::with('pacoteperso','user')->where('user_id',$user)->latest()->paginate(10);



        return view('shopping',compact('pacotesusuario','pacotespersosusuario'));
    }
}
