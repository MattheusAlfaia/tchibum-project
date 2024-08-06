<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Opcoe;

class ActivitiesController extends Controller
{

      public function index(){

        $opcoes = Opcoe::latest()->paginate(6);

        return view('activities',compact('opcoes'));
    }

    public function activity(Opcoe $opcoe){


        return view('activity',compact('opcoe'));

    }
}
