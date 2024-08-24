<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parceiro;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\ParceirosRequest;

class ParceiroControllers extends Controller
{
    public function index()
    {
        $parceiro = Cache::remember('parceiro', 60, function () {
            return Parceiro::find(1);
        });

        return view('contatus', compact('parceiro'));
    }

    public function mensagem(ParceirosRequest $request)
    {
        Parceiro::create($request->validated());

        return redirect()->back()->with('message', 'Sua mensagem foi enviada com sucesso!');
    }
}
