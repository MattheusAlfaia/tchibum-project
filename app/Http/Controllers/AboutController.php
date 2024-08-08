<?php

namespace App\Http\Controllers;

use App\Models\Sobre;
use Illuminate\Support\Facades\Cache;

class AboutController extends Controller
{
    public function index()
    {

        $sobre = Cache::remember('sobre_1', 60, function () {
            return Sobre::find(1);
        });

       
        return view('about', compact('sobre'));
    }
}
