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
        // Cache para o registro específico da tabela 'home'
        $home = Cache::remember('home_1', 60, function () {
            return Home::find(1);
        });

        // Cache para todos os depoimentos
        $depoimentos = Cache::remember('depoimentos', 60, function () {
            return Depoimentos::all();
        });

        // Cache para todas as imagens da galeria
        $imagens = Cache::remember('galeria', 60, function () {
            return Galeria::all();
        });

        // Cache para os posts mais recentes com paginação
        $posts = Cache::remember('posts', 60, function () {
            return Posts::latest()->paginate(6);
        });

        // Cache para as comunidades mais recentes com paginação
        $comunidades = Cache::remember('comunidades', 60, function () {
            return Comunidade::latest()->paginate(6);
        });

        // Cache para todas as opções
        $opcoes = Cache::remember('opcoes', 60, function () {
            return Opcoe::all();
        });

        // Cache para todos os pacotes com as respectivas comunidades
        $pacotes = Cache::remember('pacotes', 60, function () {
            return Pacote::with('comunidade')->get();
        });

        // Renderiza a view com os dados cacheados
        return view('home', compact('depoimentos', 'home', 'imagens', 'posts', 'comunidades', 'opcoes', 'pacotes'));
    }
}
