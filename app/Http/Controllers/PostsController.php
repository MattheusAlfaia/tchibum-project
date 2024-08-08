<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use Illuminate\Support\Facades\Cache;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Cache::remember('posts_page_' . request('page', 1), 60, function () {
            return Posts::latest()->paginate(3);
        });

        return view('posts', compact('posts'));
    }

    public function post($datepost)
    {
        $post = Cache::remember('post_' . $datepost, 60, function () use ($datepost) {
            $post = Posts::where('created_at', $datepost)->firstOrFail();
            return $post;
        });

        return view('post', compact('post'));
    }
}
