<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function tambah(Request $request)
    {
        $validate = $request->validate([
            "name" => "required",
            "email" => "email",
            "password" => "required|min:8"
        ]);

        $validate['password'] = bcrypt($validate['password']);

        User::create($validate);
        return redirect('/admin');
    }
}
