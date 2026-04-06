<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function careers()
    {
        return view('pages.careers');
    }

    public function salaries()
    {
        return view('pages.salaries');
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
