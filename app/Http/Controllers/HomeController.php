<?php

namespace App\Http\Controllers;

use App\Models\Depoimentos;
use App\Models\Home;
use App\Models\Galeria;
use App\Models\Posts;
use App\Models\Comunidade;
use App\Models\Opcoe;
use App\Models\Pacote;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        $home = Cache::remember('home_1', 60, function () {
            return Home::find(1);
        });

        $depoimentos = Cache::remember('depoimentos', 60, function () {
            return Depoimentos::all();
        });

        $imagens = Cache::remember('galeria', 60, function () {
            return Galeria::all();
        });

        $posts = Posts::latest()->paginate(6);

        $comunidades = Comunidade::latest()->paginate(6);

        $opcoes = Cache::remember('opcoes', 60, function () {
            return Opcoe::all();
        });

        $pacotes = Cache::remember('pacotes', 60, function () {
            return Pacote::with('comunidade')->get();
        });

        return view('home', compact('depoimentos', 'home', 'imagens', 'posts', 'comunidades', 'opcoes', 'pacotes'));
    }
}
