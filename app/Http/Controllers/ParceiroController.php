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
}
