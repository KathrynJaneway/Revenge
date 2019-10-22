<?php namespace App\Http\Controllers;

class PageController extends Controller {
    public function index()
    {

        return view('home');
    }

    public function projectlist()
    {
        return view('pages/projectlist');
    }

    public function project_movie()
    {
        return view('pages/projects/movie');
    }

   /** public function project_movieAPI()
    {
        return view('pages/projects/api/movieAPI/titleSearchRequest');
    }**/

    public function project_havenstones()
    {
        return view('pages/projects/havenstones');
    }

    public function project_my_own_docs()
    {
        return view('pages/projects/mermaid');
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