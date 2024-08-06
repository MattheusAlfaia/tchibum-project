<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sobre;

class AboutController extends Controller
{


    public function index(){

        $sobre = Sobre::find(1);



        return view('about',compact('sobre'));
    }
}
