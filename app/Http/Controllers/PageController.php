<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function home()
    {
        return view('landingpage.home');
    }

    public function about()
    {
        return view('landingpage.about');
    }

    public function contact()
    {
        return view('landingpage.contact');
    }
    public function cv()
    {
        return view('landingpage.cv');
    }
}
