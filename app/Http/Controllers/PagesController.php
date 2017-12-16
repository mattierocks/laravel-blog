<?php

namespace App\Http\Controllers;

class PagesController extends Controller {

    public function getIndex() {
        return view('pages.welcome');
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