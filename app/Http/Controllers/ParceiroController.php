<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parceiro;
use App\Models\ParceirosPage;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\ParceirosRequest;

class ParceiroController extends Controller
{
    public function index()
    {
        $parceiros_page = Cache::remember('parceiros_page', 60, function () {
            return ParceirosPage::find(1);
        });

        return view('parceiros', compact('parceiros_page'));
    }

    public function mensagem(Request $request)
    {
        $data = $request->only([
            'nome',
            'email',
            'seguimento',
            'responsavel',
            'cargo',
            'cnpj',
            'cadastur',
            'endereco',
            'cep',
            'mensagem',
            'accepted_terms',
            'cidade',
            'comunidade',
            'numero'
        ]);
        if($request->accepted_terms == 'on'){
            $data['accepted_terms'] = 1;
        } else {
            $data['accepted_terms'] = 0;
        }

        Parceiro::create($data);

        return redirect()->back()->with('message', 'Sua mensagem foi enviada com sucesso!');
    }

}
