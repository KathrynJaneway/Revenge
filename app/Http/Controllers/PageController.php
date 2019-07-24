<?php namespace App\Http\Controllers;

class PageController extends Controller {
    public function index()
    {
        return view('home');
    }

    public function projects()
    {
        return view('pages/projects');
    }

    public function contact()
    {
        return view('pages/contact');
    }

    public function about()
    {
        return view('pages/about');
    }

    public function impressum()
    {
        return view('pages/impressum');
    }
}