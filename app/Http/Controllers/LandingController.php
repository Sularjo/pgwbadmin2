<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function landing()
    {
        return view('profil',[
            "page" => "Profil"
        ]);
    }

    public function about()
    {
        return view('about',[
            "page" => "About"
        ]);
    }

    public function project()
    {
        return view('project',[
            "page" => "Projects"
        ]);
    }

    public function contact()
    {
        return view('contact',[
            "page" => "Contact"
        ]);
    }
}
