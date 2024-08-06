<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contato;
use App\Models\Mensagem;

class ContatusController extends Controller
{
    public function index(){

        $contato = Contato::find(1);


        return view('contatus',compact('contato'));
    }


    public function mensagem(Request $request){

       $response =  Mensagem::create([
            'nome_cliente' => $request->nome_cliente,
            'email_cliente' => $request->email_cliente,
            'assunto_cliente' => $request->assunto_cliente,
            'mensagem_cliente' => $request->mensagem_cliente,
        ]);

        return redirect()->back()->with('message',"Sua mensagem foi enviada com sucesso !!!");
    }
}
