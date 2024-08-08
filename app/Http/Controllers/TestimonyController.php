<?php

namespace App\Http\Controllers;

use App\Models\Depoimentos;
use Illuminate\Support\Facades\Cache;

class TestimonyController extends Controller
{
    public function index()
    {
        $cacheKey = 'depoimentos_all';

        $depoimentos = Cache::remember($cacheKey, 60, function () {
            return Depoimentos::latest()->get();
        });

        $currentPage = request('page', 1);
        $perPage = 6;

        $paginatedDepoimentos = $depoimentos->slice(($currentPage - 1) * $perPage, $perPage)->values();

        return view('testimony', compact('paginatedDepoimentos', 'depoimentos'));
    }
}
