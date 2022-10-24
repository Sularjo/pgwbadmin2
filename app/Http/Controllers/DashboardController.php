<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function tampil()
    {
        return view('dashboard',[
            "page" => "admin"
        ]);
    }
}
