<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
    public function getSingle($slug) {
        // fetch from DB based on slug
        $post = Post::where('slug', '=', $slug)->first();

        // return view and pass in post object
        return view('blog.single')->withPost($post);
    }
}
