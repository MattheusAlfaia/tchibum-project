<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comunidade;

class CommunityController extends Controller
{
    public function index(){

        $comunidades = Comunidade::latest()->paginate(6);

        return view('communities',compact('comunidades'));

    }

    public function community(Comunidade $comunidade){

        $imagedefault = 'default.png';

        $image1 = isset($comunidade->imagens_secundarias[0]) ? $comunidade->imagens_secundarias[0] : NULL;
        $image2 = isset($comunidade->imagens_secundarias[1]) ? $comunidade->imagens_secundarias[1] : NULL;
        $image3 = isset($comunidade->imagens_secundarias[2]) ? $comunidade->imagens_secundarias[2] : NULL;
        $image4 = isset($comunidade->imagens_secundarias[3]) ? $comunidade->imagens_secundarias[3] : NULL;
        $image5 = isset($comunidade->imagens_secundarias[4]) ? $comunidade->imagens_secundarias[4] : NULL;

        return view('community',compact('comunidade','image1','image2','image3','image4','image5'));

    }
}
