<?php

namespace App\Http\Controllers;

use App\Post;

class PagesController extends Controller {

    public function getIndex() {
        $posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
        return view('pages.welcome')->withPosts($posts);
    }

    public function getAbout() {
        $first = 'Mattie';
        $last = 'Fuller';

        $fullname = $first . " " . $last;
        return view('pages.about')->withFullname($fullname);
    }

    public function getContact() {
        $email = 'mattie@mattiefuller.me';

        return view('pages.contact')->withEmail($email);
    }


}