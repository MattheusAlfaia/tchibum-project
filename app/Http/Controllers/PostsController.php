<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;


class PostsController extends Controller
{

    public function index(){

        $posts = Posts::latest()->paginate(3);


        return view('posts',compact('posts'));

    }


    public function post($datepost){

        $post = Posts::where('created_at', $datepost)->get();

        $post = $post[0];

        return view('post',compact('post'));
    }

}

