<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parceiro;
use App\Models\ParceirosPage;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\ParceirosRequest;

class ParceiroControllers extends Controller
{
    public function index()
    {
        $parceiro_page = Cache::remember('parceiro', 60, function () {
            return ParceirosPage::find(1);
        });

        return view('parceiros', compact('parceiros'));
    }

    public function mensagem(ParceirosRequest $request)
    {
        Parceiro::create($request->validated());

        return redirect()->back()->with('message', 'Sua mensagem foi enviada com sucesso!');
    }
}
