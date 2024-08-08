<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use App\Models\Mensagem;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\MensagemRequest;

class ContatusController extends Controller
{
    public function index()
    {
        $contato = Cache::remember('contato', 60, function () {
            return Contato::find(1);
        });

        return view('contatus', compact('contato'));
    }

    public function mensagem(MensagemRequest $request)
    {
        Mensagem::create($request->validated());

        return redirect()->back()->with('message', 'Sua mensagem foi enviada com sucesso!');
    }
}
